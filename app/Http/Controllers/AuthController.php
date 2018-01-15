<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailToUsers;
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
            'password' => bcrypt($request->password),
            'phonefield' => $request->phonefield,
            'username' => $request->username,

        ]);

    	auth()->login($user);

    	$job = new SendEmailToUsers($user);

    	$this->dispatch($job->onQueue('email'));

        session()->flash('message', 'You have registered successfully!');
    	
		return redirect($this->redirectTo);

    }

    public function logout()
    {
    	auth()->logout();

    	return redirect('/login');
    }
}
