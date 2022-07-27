<?php

use App\Http\Controllers\AdministrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use Illuminate\Http\Request;

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

// VIEWS

// public routes
Route::get('/', [PublicController::class, 'index'])->middleware('guest');
Route::get('/about-us', [PublicController::class, 'about_us'])->middleware('guest');
Route::get('/events', [PublicController::class, 'events'])->middleware('guest');
Route::get('/membership', [PublicController::class, 'membership'])->middleware('guest');
Route::get('/contact-us', [PublicController::class, 'contact_us'])->middleware('guest');
Route::get('/privacy-statement', [PublicController::class, 'privacy_statement'])->middleware('guest');

// administration routes
Route::get('/administration', [AdministrationController::class, 'login'])->name('login')->middleware('guest:administrator');
Route::get('/administration/members', [AdministrationController::class, 'members'])->middleware('auth:administrator');
Route::get('/administration/applications', [AdministrationController::class, 'applications'])->middleware('auth:administrator');

// Admin login
Route::post('/administration/authenticate', [AdministrationController::class, 'authenticate']);
Route::post('/administration/logout', [AdministrationController::class, 'logout'])->middleware('auth:administrator');

// crs
Route::get('crs/application', function (Request $request) {
    return response(['da' => 'asd'], 200);
})->middleware('auth:administrator');
