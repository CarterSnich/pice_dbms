<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Models\Member;

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


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// public pages
Route::get('/', [PublicController::class, 'index']);
Route::get('/about-us', [PublicController::class, 'about_us']);
Route::get('/events', [PublicController::class, 'events']);
Route::get('/events/{event}', [PublicController::class, 'event']);
Route::get('/membership', [PublicController::class, 'membership']);
Route::get('/application', [PublicController::class, 'application']);
Route::get('/contact-us', [PublicController::class, 'contact_us']);
Route::get('/privacy-statement', [PublicController::class, 'privacy_statement']);

// application routes
Route::post('/application/submit', [ApplicationController::class, 'store'])->middleware('guest');
Route::post('/application/submit_form', [ApplicationController::class, 'submit_form'])->middleware('guest');


/*
|--------------------------------------------------------------------------
| MEMBERS ROUTES
|--------------------------------------------------------------------------
*/

// members pages
Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->middleware('auth:member');

// members route
Route::post('/member/authenticate', [MemberController::class, 'authenticate']);
Route::post('/member/logout', [MemberController::class, 'logout']);



/*
|--------------------------------------------------------------------------
| ADMINISTRATION ROUTES
|--------------------------------------------------------------------------
*/

// administration pages
Route::get('/administration', [AdministrationController::class, 'login'])->name('login')->middleware('guest:administrator');
Route::get('/administration/members', [AdministrationController::class, 'members'])->middleware('auth:administrator');
Route::get('/administration/applications', [AdministrationController::class, 'applications'])->middleware('auth:administrator');
Route::get('/administration/membership_fees', [AdministrationController::class, 'membership_fees'])->middleware('auth:administrator');
Route::get('/administration/events', [AdministrationController::class, 'events'])->middleware('auth:administrator');

// Admin login
Route::post('/administration/authenticate', [AdministrationController::class, 'authenticate']);
Route::post('/administration/logout', [AdministrationController::class, 'logout'])->middleware('auth:administrator');

// members
Route::post('/administration/members/get_member', [MemberController::class, 'get_member'])->middleware('auth:administrator');
Route::get('/administration/members/{member}/edit', [MemberController::class, 'edit_member'])->middleware('auth:administrator');
Route::post('/administration/members/{member}/edit', [MemberController::class, 'update_member'])->middleware('auth:administrator');

// applications
Route::post('/administration/applications/get_application', [ApplicationController::class, 'application'])->middleware('auth:administrator');
Route::get('/administration/applications/form/{application}', [ApplicationController::class, 'form'])->middleware('auth:administrator');
Route::post('/administration/applications/approve/{application}', [ApplicationController::class, 'approve'])->middleware('auth:administrator');
Route::post('/administration/applications/reject/{application}', [ApplicationController::class, 'reject'])->middleware('auth:administrator');
Route::post('/administration/applications/get_applications', [ApplicationController::class, 'get_applications'])->middleware('auth:administrator');

// membership fees routes
Route::post('/administration/membership_fees/paid/{application}', [ApplicationController::class, 'paid'])->middleware('auth:administrator');

// events
Route::post('/administration/events', [EventController::class, 'store'])->middleware('auth:administrator');
