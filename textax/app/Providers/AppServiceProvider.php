<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Render custom error pages
        $this->app->bind(404, function ($exception) {
            // Log the 404 exception
            Log::error('404 Not Found: ' . $exception->getMessage());

            // Return a custom response for 404
            return response()->view('errors.404', [], 404);
        });

        // Handle specific exception types
        $this->app->bind(QueryException::class, function ($exception) {
            // Log the query exception
            Log::error('Query Exception: ' . $exception->getMessage());

            // Return a custom response for query exceptions
            return response()->view('errors.custom', [], 500);
        });

        // Add more error handling as needed
    }
}
