<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;

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
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        /**
         * prepare response object from exception
         */
        $response = $this->convertExceptionToResponse($exception);
        $response->exception = $exception;

        $message = $exception instanceof ValidationException 
            ? $exception->validator->getMessageBag() 
            : $exception->getMessage();
        /**
         * prepare response data
         */
        $this->responseContent = [
            'code' => $response->getStatusCode() ?? 500,
            'success' => false,
            'message' => $message ?? 'Terjadi kesalahan. Silahkan ulangi kembali setelah beberapa saat lagi.',
        ];

        return response()->json(
            $this->responseContent,
            $response->getStatusCode() ?? 500
        );

        // return parent::render($request, $exception);
    }
}
