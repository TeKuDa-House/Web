<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                // Handle specific exception: model not found
                Log::error('Model not found: ' . $e->getMessage());
            } elseif ($e instanceof \Illuminate\Validation\ValidationException) {
                // Handle validation exception
                Log::error('Validation exception: ' . $e->getMessage());
            } else {
                // Handle other exceptions
                Log::error('Unhandled exception: ' . $e->getMessage());
            }
        });
    }
}
