<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Application;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Evaluation;

class StudentController extends Controller
{
    public function showRequests(){
        return view('student.applications', ['applications' => auth()->user()->applications()->get()]);
    }

    public function createRequest() {
        $modules = Module::all();
        return view('student.create_app', compact('modules'));
    }

    public function storeRequest(Request $request){
        $formFields = $request->validate([
            'evaluation_id' => 'required'
        ]);
        $formFields['user_id'] = auth()->id();
        Application::create($formFields);
        return redirect('/studentas/prasymai')->with('message', 'Sėkmingai sukūrėte naują prašymą!');
    }

    public function addPaymentInfoToApplication(Application $application){
        return view('student.application_edit', ['application' => $application]);
    }

    public function updatePaymentInfoForApplication(Request $request, Application $application){

        if($application->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'iban' => ['required', 'max:34'],
            'bank_statement' => 'file|mimes:pdf,jpg|required'
        ]);


        $formFields['bank_statement'] = $request->file('bank_statement')->store('statements', 'public');
        $formFields['status_id'] = '3';

        $application->update($formFields);

        return redirect('/studentas/prasymai')->with('message', 'Pavedimo informacija sėkmingai pridėta!');
    }

    public function getStatementPhoto(Request $request, Application $application){
        if($request->user()->id != $application->user->id && $request->user()->role_id != '2'){
            return redirect(RouteServiceProvider::HOME)->with('message', 'Negalima pasiekti šio puslapio!');
        }
        $filePath = storage_path('app/public/' . $application->bank_statement);

        return response()->download($filePath);
    }

    public function getDebtSlip(Request $request, Application $application){
        if($request->user()->id != $application->user->id && $request->user()->id != $application->evaluation->module->user_id){
            return redirect(RouteServiceProvider::HOME)->with('message', 'Negalima pasiekti šio puslapio!');
        }
        $filePath = storage_path('app/public/' . $application->debt_slip);

        return response()->download($filePath);
    }
}
