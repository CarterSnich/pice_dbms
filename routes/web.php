<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdministrationController;


/*
 |--------------------------------------------------------------------------
 | PUBLIC ROUTES
 |--------------------------------------------------------------------------
 */

// Public pages
Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about-us',  'about_us');
    Route::get('/events',  'events');
    Route::get('/events/{event}',  'event');
    Route::get('/membership',  'membership');
    Route::get('/contact-us',  'contact_us');
    Route::get('/privacy-statement',  'privacy_statement');
    Route::get('/member-signup',  'member_signup')->middleware('guest:member');
});


/* 
 | --------------------------------------------------------------------------
 | MEMBERS ROUTES
 |--------------------------------------------------------------------------
 */

Route::controller(MemberController::class)->group(function () {
    // members pages
    Route::get('/application',  'application')->middleware('auth:member');
    Route::get('/member/profile', 'profile')->name('member_profile')->middleware('auth:member');

    // members route
    Route::post('/member/authenticate',  'authenticate');
    Route::get('/member/logout', 'logout')->middleware('auth:member');
    Route::post('/member-signup', 'signup')->middleware('guest:member');
});


// application
Route::controller(ApplicationController::class)->group(function () {
    Route::post('/application/submit', 'store');
    Route::post('/application/submit_form', 'submit_form');
});

/*
 |--------------------------------------------------------------------------
 | ADMINISTRATION
 |--------------------------------------------------------------------------
 */

// Admin authentication
Route::controller(AdministrationController::class)->group(function () {
    Route::get('/administration',  'login')->middleware('guest:administrator');
    Route::post('/administration/authenticate',  'authenticate')->middleware('guest:administrator');
    Route::post('/administration/logout', 'logout')->middleware('auth:administrator');
});

// administration pages
Route::middleware('auth:administrator')->controller(AdministrationController::class)->group(function () {
    Route::get('/administration/members',  'members');
    Route::get('/administration/applications',  'applications');
    Route::get('/administration/membership_fees', 'membership_fees');
    Route::get('/administration/events',  'events');
});

// members
Route::middleware('auth:administrator')->controller(MemberController::class)->group(function () {
    Route::post('/administration/members/get_member', 'get_member');
    Route::get('/administration/members/{member}/edit', 'edit_member');
    Route::post('/administration/members/{member}/edit', 'update_member');
});

// applications
Route::middleware('auth:administrator')->controller(ApplicationController::class)->group(function () {
    Route::post('/administration/applications/get_application', 'application');
    Route::get('/administration/applications/form/{application}', 'form');
    Route::post('/administration/applications/approve/{application}', 'approve');
    Route::post('/administration/applications/reject/{application}', 'reject');
    Route::post('/administration/applications/get_applications', 'get_applications');
    Route::post('/administration/membership_fees/paid/{application}', 'paid');
});

// events
Route::middleware('auth:administrator')->controller(EventController::class)->group(function () {
    Route::post('/administration/events', 'store');
});
