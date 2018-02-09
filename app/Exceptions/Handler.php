<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\Access\AuthorizationException;
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Exceptions\NotFoundExeption;
use App\Exceptions\AnotherExceptions;
use Illuminate\Support\Facades\Log;
use App\Exceptions\QueryException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];
    
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //dd($exception instanceof \Illuminate\Database\QueryException,  22222);

//        dd($exception);
        if($exception instanceof AuthorizationException)
        {
            return response()->view('errors.403');
        }
//
//        if($exception instanceof NotFoundHttpException)
//        {
//            throw new NotFoundException($exception );
//        }

        if($exception instanceof \Illuminate\Database\QueryException)
        {
            throw new QueryException($exception );
        }

        if($exception instanceof  \Symfony\Component\HttpKernel\Exception\HttpException)
        {
            throw new NotFoundException($exception );
        }

        if($exception instanceof \Symfony\Component\Debug\Exception\FatalThrowableError)
        {
            $_token = str_random();

            Log::error($_token."\n".$exception);

            throw new AnotherExceptions($_token);
        }

        return parent::render($request, $exception);

    }
}
