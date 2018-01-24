<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\CheckAuthToken as CheckAuthTokenUsers;
use App\User;
use App\Contracts\UserInterface;

class CheckAuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = User::where('authorization', $request->header('Authorization'))->first();

        resolve(UserInterface::class)->user = $user;

        if (is_null($user)) {

            return response()->json('Bad Request!');
        }


        return $next($request);
    }
}
