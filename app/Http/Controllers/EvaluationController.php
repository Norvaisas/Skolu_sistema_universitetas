<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Module;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function getEvaluationsByModule(Request $request, $module_id) {
        if (!$request->ajax()) {
            return redirect(RouteServiceProvider::HOME)->with('message', 'Negalima pasiekti šio puslapio!');
        }
        // Retrieve the evaluations based on the $module_id.
        $evaluations = Evaluation::where('module_id', $module_id)->get();

        // Return the evaluations as JSON data.
        return response()->json($evaluations);
    }
}
