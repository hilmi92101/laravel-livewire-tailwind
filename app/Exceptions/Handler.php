<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // BY DEFAULT, NO NEED BELOW CODE UNLESS WANT CUSTOM RESPONSES
    // public function render($request, Throwable $e) 
    // { 
    //     //dd($e); 
         
    //     // if it's only an api request 
    //     if($request->is('api*')){ 
    //         if($e instanceof \Illuminate\Validation\ValidationException){ 
    //             return response([ 
    //                 'status' => 'error', 
    //                 'errors' => $e->errors(), 
    //             ], 422); 
    //         } 
    //     } 
    //     parent::render($request, $e); 
    // }

    public function render($request, Throwable $e) 
    { 
        //dd($e); 
         
        // if it's only an api request 
        if($request->is('api*')){ 
            if($e instanceof \Illuminate\Validation\ValidationException){ 
                return response([ 
                    'instanceof' => 'ValidationException', 
                    'status' => 'error', 
                    'errors' => $e->errors(), 
                ], 422); 
            } 

            if($e instanceof \Illuminate\Auth\Access\AuthorizationException){ 
                return response([ 
                    'instanceof' => 'AuthorizationException', 
                    'status' => 'error', 
                    'error' => $e->getMessage(), 
                ], 403); 
            } 
            if($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException || $e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){ 
                return response([ 
                    'instanceof' => 'ModelNotFoundException',
                    'status' => 'error', 
                    'error' => 'Resource Not Found', 
                ], 404); 
            } 
            // if token is wrong 
            if($e instanceof \Illuminate\Auth\AuthenticationException){ 
                return response([ 
                    'instanceof' => 'AuthenticationException',
                    'status' => 'error', 
                    'error' => $e->getMessage(), 
                ], 401); 
            } 
            // if none above exception is caught 
            return response([ 
                'request' => $request->all(), 
                'e' => $e, 
                'status' => 'error', 
                'error' => 'Something went wrong', 
            ], 500); 
        } 
        parent::render($request, $e); 
    }
    
}
