<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MAil\WelcomeAgain;
use App\Http\Requests\ValidateRegistrationForm;

class AuthController extends Controller
{
    protected $redirectTo = '/articles';

    public function showLogin()
    {
    	return view('auth.login');
    }

    public function login(Request $request)
    {
    	if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
    		return redirect($this->redirectTo);
    	}

    	return back();
    }

    public function showRegister()
    {
    	return view('auth.register');
    }

    public function register(ValidateRegistrationForm $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

    	auth()->login($user);

        \Mail::to($user)->send(new WelcomeAgain);

        session()->flash('message', 'You have registered successfully!');
    	
		return redirect($this->redirectTo);

    }

    public function logout()
    {
    	auth()->logout();

    	return redirect('/login');
    }
}
