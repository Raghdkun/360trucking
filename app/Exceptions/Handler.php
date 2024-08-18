<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404) {
                // Custom 404 page
                return response()->view('errors.404', [], 404);
            }
        }

        return parent::render($request, $exception);
    }
}
