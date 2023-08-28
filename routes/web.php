<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('front.home');
});
Route::get('/majors', function () {
    return view('front.pages.majors');
});
Route::get('/doctors', function () {
    return view('front.pages.doctors');
});
Route::get('/make-an-appointment', function () {
    return view('front.pages.booking');
});
Route::get('/contact-us', function () {
    return view('front.pages.contact');
});
Route::get('/login', function () {
    return view('front.pages.login');
});
Route::get('/register', function () {
    return view('front.pages.register');
});

Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/majors', [MajorController::class, 'index'])->name('major.index');
Route::get('/admin/majors/create', [MajorController::class, 'create'])->name('major.create');
Route::post('/admin/majors/store', [MajorController::class, 'store'])->name('major.store');
Route::get('/admin/majors/edit/{id}', [MajorController::class, 'edit'])->name('major.edit');
Route::put('/admin/majors/update/{id}', [MajorController::class, 'update'])->name('major.update');
Route::delete('/admin/majors/delete/{id}', [MajorController::class, 'destroy'])->name('major.destroy');
