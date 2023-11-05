<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function showModules(){
        return view('lecturer.modules', ['modules' => auth()->user()->modules()->get()]);
    }

    public function assignModule(Request $request){
        $formFields = $request->validate([
            'module_id' => 'required',
            'evaluation_duration' => 'required'
        ]);

        $user_id = auth()->user()->id;

        $module = Module::findOrFail($formFields['module_id']);

        $module->user_id = $user_id;

        $module->evaluation_duration = $formFields['evaluation_duration'];

        $module->save();

        // Redirect or return a response as needed
        return redirect('/destytojas/moduliai')->with('message', 'Naujas modulis sėkmingai pridėtas');
    }

    public function showAssignModule(){
        $modules = Module::all();
        return view('lecturer.assign_module', ['modules' => $modules]);
    }
}
