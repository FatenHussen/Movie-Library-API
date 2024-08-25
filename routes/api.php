<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes (do not require login)
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Routes that require login
Route::middleware('auth:api')->group(function () {

    // Logout route
    Route::post('logout', [AuthController::class, 'logout']);

    // Movie-related routes
    Route::get('movies', [MovieController::class, 'index']); // Display movies with filtering, sorting, and pagination support

    // Get ratings for a specific movie
    Route::get('movies/{id}/ratings', [MovieController::class, 'getMovieWithRatings']);

    // Movie management routes (Admin only)
    Route::middleware('admin')->group(function () {
        Route::apiResource('movies', MovieController::class)->except(['index', 'show']);
    });

    // Rating management routes (User only)
    Route::middleware('user')->group(function () {
        Route::apiResource('ratings', RatingController::class);
    });

    // Additional rating routes
    Route::get('users/{user}/ratings', [RatingController::class, 'getUserRatings']); // Get all ratings for a specific user
    Route::get('movies/{movie}/ratings', [RatingController::class, 'getMovieRatings']); // Get all ratings for a specific movie
});
