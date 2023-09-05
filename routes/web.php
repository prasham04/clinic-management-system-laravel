<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\MajorController;
use App\Http\Controllers\admin\auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Front routes

Route::group([

    'as' => 'front.'

], function () {
    Route::get('/', function () {
        return view('front.home');
    })->name('home');
    
    Route::get('/majors', function () {
        return view('pages.majors');
    })->name('majors');

    // Doctors    
    Route::get('/doctors', [\App\Http\Controllers\user\DoctorController::class, 'index'])->name('doctors');
    Route::get('/booking/{doctor}',[\App\Http\Controllers\user\DoctorController::class, 'bookingPage'])->name('bookingPage');    
    Route::post('/booking/{doctor}',[\App\Http\Controllers\user\DoctorController::class, 'booking'])->name('booking');

    // Contacts
    Route::get('/contact-us', [\App\Http\Controllers\user\ContactController::class, 'index'])->name('contact');
    Route::post('/contact-us/store', [\App\Http\Controllers\user\ContactController::class, 'store'])->name('contact.store');

});

//----------------------------------------------------------------------------------------------------------------------------//

// Admin routes

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',

] , function() {

    Route::group([
        'middleware' => ['guest'],
        'controller' => LoginController::class,
    ],
    function() {
        Route::get('/login', 'loginPage')->name('loginPage');
        Route::post('/login', 'login')->name('login');
    }
    );

    Route::group([
        'middleware' => ['auth', 'checkIsAdmin']
    ],
    function() {
    
    Route::get('', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Majors
    Route::get('/majors', [MajorController::class, 'index'])->name('major.index');
    Route::get('/majors/create', [MajorController::class, 'create'])->name('major.create');
    Route::post('/majors/store', [MajorController::class, 'store'])->name('major.store');
    Route::get('/majors/edit/{major}', [MajorController::class, 'edit'])->name('major.edit');
    Route::put('/majors/update/{major}', [MajorController::class, 'update'])->name('major.update');
    Route::delete('/majors/delete/{major}', [MajorController::class, 'destroy'])->name('major.destroy');

    // Doctors
    Route::get('/doctors', [App\Http\Controllers\admin\DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctors/create', [App\Http\Controllers\admin\DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctors/store', [App\Http\Controllers\admin\DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctors/edit/{doctor}', [App\Http\Controllers\admin\DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctors/update/{doctor}', [App\Http\Controllers\admin\DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctors/delete/{doctor}', [App\Http\Controllers\admin\DoctorController::class, 'destroy'])->name('doctor.destroy');

    // Bookings
    Route::get('/bookings', [App\Http\Controllers\admin\BookingController::class, 'index'])->name('booking.index');
    Route::delete('/bookings/delete/{booking}', [App\Http\Controllers\admin\BookingController::class, 'destroy'])->name('booking.destroy');

    // Users
    Route::get('/users', [App\Http\Controllers\admin\UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [App\Http\Controllers\admin\UserController::class, 'create'])->name('user.create');
    Route::post('/users/store', [App\Http\Controllers\admin\UserController::class,'store'])->name('user.store');
    Route::get('/users/edit/{user}', [App\Http\Controllers\admin\UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/update/{user}', [App\Http\Controllers\admin\UserController::class, 'update'])->name('user.update');
    Route::delete('/users/delete/{user}', [App\Http\Controllers\admin\UserController::class, 'destroy'])->name('user.destroy');

    // contacts 
    Route::get('/contacts', [App\Http\Controllers\admin\ContactController::class, 'index'])->name('contact.index');
    Route::delete('/contacts/delete/{contact}', [App\Http\Controllers\admin\ContactController::class, 'destroy'])->name('contact.destroy');
    }
    );
});

require_once __DIR__ . '/auth.php';
