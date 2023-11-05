<?php

use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get("studentas/prasymai/{application}/israsas", [StudentController::class, 'getStatementPhoto']) -> middleware(['auth', 'authRole:0,2']);
Route::get("studentas/prasymai/{application}/lapelis", [StudentController::class, 'getDebtSlip']) -> middleware(['auth', 'authRole:0,1']);
Route::prefix("studentas")->middleware(['auth', 'authRole:0'])->group(function(){
   Route::get("/prasymai", [StudentController::class, 'showRequests']);
   Route::get("/prasymai/naujas", [StudentController::class, 'createRequest']);
   Route::post("/prasymai/naujas", [StudentController::class, 'storeRequest']);
   Route::get("/{application}/pavedimas", [StudentController::class, 'addPaymentInfoToApplication']);
   Route::put("/{application}/pavedimas", [StudentController::class, 'updatePaymentInfoForApplication']);
});

Route::prefix("destytojas")->middleware(['auth', 'authRole:1'])->group(function(){
   Route::get("/moduliai", [LecturerController::class, 'showModules']);
   Route::get("/modulis/priskyrimas", [LecturerController::class, 'showAssignModule']);
   Route::post("/modulis/priskyrimas", [LecturerController::class, 'assignModule']);
});

Route::prefix("administratorius")->middleware(['auth', 'authRole:2'])->group(function() {
    Route::get("/prasymai",[AdminController::class, 'showActiveApplications']);
    Route::post("/prasymai/{application}/tvirtinti",[AdminController::class, 'confirmApplication']);
    Route::post("/prasymai/{application}/lapelis",[AdminController::class, 'addSlip']);
    Route::get("/moduliai",[AdminController::class, 'showModules']);
    Route::post("/moduliai/{module}/kaina",[AdminController::class, 'changeModulePrice']);
    Route::get("/moduliai/{module}/atsiskaitymas",[AdminController::class, 'getNewEval']);
    Route::post("/moduliai/{module}/atsiskaitymas",[AdminController::class, 'storeNewEval']);
});

Route::get('/prasymai/{module_id}', [EvaluationController::class, 'getEvaluationsByModule']);

