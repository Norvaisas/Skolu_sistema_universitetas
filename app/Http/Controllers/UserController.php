<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Rodyti registracijos forma
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'surname' => ['required', 'min:3'],
            'vidko' => ['required', 'min:5', 'max:5', Rule::unique('users','vidko')],
            'password' => ['required', 'confirmed', 'min:6'],
            'role_id' => ['required']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'Vartotojas sukurtas, prisijungta prie sistemos');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','Sėkmingai atsijungėte!');
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'vidko' => ['required', 'min:5', 'max:5'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Sėkmingai prisijungėte!');
        }

        return back()->withErrors(['vidko' => 'InvalidCredentials'])->onlyInput('vidko');
    }
}
