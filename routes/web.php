<?php

use App\Http\Controllers\Oauth\FacebookController;
use App\Http\Controllers\Oauth\GithubController;
use App\Http\Controllers\Oauth\GoogleController;
use App\Http\Controllers\Oauth\LinkedinController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/** Google OAuth Routes */
Route::get('/auth/google/redirect', [GoogleController::class, 'handleDriverRedirect']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleDriverCallback']);

/** Github OAuth Routes */
Route::get('/auth/github/redirect', [GithubController::class, 'handleDriverRedirect']);
Route::get('/auth/github/callback', [GithubController::class, 'handleDriverCallback']);

/** Linkedin OAuth Routes */
Route::get('/auth/linkedin/redirect', [LinkedinController::class, 'handleDriverRedirect']);
Route::get('/auth/linkedin/callback', [LinkedinController::class, 'handleDriverCallback']);

/** Facebook OAuth Routes */
Route::get('/auth/facebook/redirect', [FacebookController::class, 'handleDriverRedirect']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleDriverCallback']);


require __DIR__ . '/auth.php';
