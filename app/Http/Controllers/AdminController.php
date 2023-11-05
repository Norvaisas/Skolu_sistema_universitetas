<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Evaluation;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    public function showActiveApplications(){
        return view('admin.applications', ['applications' => Application::all()]);
    }

    public function confirmApplication(Application $application) {
        // Check if the current status_id is either one or three
        if ($application->status_id === 1) {
            // Increment the status_id by one
            $application->status_id++;

            // Save the updated application to the database
            $application->save();

            return redirect('/administratorius/prasymai')->with('message', 'Sėkmingai patvirtinote prašymą!');
        } else {
            return redirect('/administratorius/prasymai')->with('message', 'Neįmanoma atlikti šio veiksmo.');
        }
    }

    public function addSlip(Request $request, Application $application) {
        // Check if the current status_id is either one or three
        if ($application->status_id === 3) {
            // Increment the status_id by one
            $application->status_id++;

            $formFields = $request->validate([
                'debt_slip' => 'file|mimes:pdf,jpg|required'
            ]);

            $formFields['debt_slip'] = $request->file('debt_slip')->store('slips', 'public');
            // Save the updated application to the database
            $application->update($formFields);

            return redirect('/administratorius/prasymai')->with('message', 'Sėkmingai patvirtinote prašymą!');
        } else {
            return redirect('/administratorius/prasymai')->with('message', 'Neįmanoma atlikti šio veiksmo');
        }
    }

    public function showModules(){
        return view('admin.modules', ['modules' => Module::all()]);
    }

    public function changeModulePrice(Request $request, Module $module){
        $formFields = $request->validate([
            'hourly_rate' => 'required'
        ]);

        $module->update($formFields);

        return back()->with('message', 'Modulio atsiskaitymo valandinis įkainis pakeistas sėkmingai!');
    }

    public function getNewEval(Module $module){
        return view('admin.evaluation', ['module' => $module]);
    }

    public function storeNewEval(Request $request, Module $module){
        $formFields = $request->validate([
            'begin_date' => 'required',
            'end_date' => 'required'
        ]);
        $formFields['module_id'] = $module->id;

        Evaluation::create($formFields);

        return back()->with('message', 'Naujas atsiskaitymo laikas pridėtas sėkmingai!');
    }
}