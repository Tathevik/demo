<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailToUsers;
use Illuminate\Http\Request;
use App\User;
use App\Mail\WelcomeAgain;
use App\Http\Requests\ValidateRegistrationForm;
use App\Events\UserRegisteringEvent;

class AuthController extends Controller
{
    protected $redirectTo = '/articles';

    public function showLogin()
    {
    	return view('auth.login');
    }

    public function login(Request $request)
    {
        if(auth()->attempt([
    	    'email' => $request->email,
            'password' => $request->password]
            )){
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

        $confirmation_code = str_random(30);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phonefield' => $request->phonefield,
            'username' => $request->username,
            'confirmation_code' => $confirmation_code,

        ]);

//    	auth()->login($user);

//    	$job = new SendEmailToUsers($user);

//    	$this->dispatch($job->onQueue('email'));
//


        \Mail::to($user)->send(new WelcomeAgain($confirmation_code));

        session()->flash('message', 'You have registered successfully!');
    	
		return redirect($this->redirectTo);

    }

    public function verified($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            return;
        }

        $user = User::where('confirmation_code', $confirmation_code)->first();

        if ( ! $user)
        {
            return;
        }

        session()->flash('message', 'You have successfully verified your account.');

        $user->update(['confirmed' => 1, 'confirmation_code' => null]);

        event(new UserRegisteringEvent($user));

        return redirect('/login');
    }

    public function logout()
    {
    	auth()->logout();

    	return redirect('/login');
    }
}
