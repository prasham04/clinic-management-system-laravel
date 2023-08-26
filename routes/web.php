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

Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

Route::get('/majors', [MajorController::class, 'index'])->name('major.index');
Route::get('/majors/create', [MajorController::class, 'create'])->name('major.create');
Route::post('/majors/store', [MajorController::class, 'store'])->name('major.store');
Route::get('/majors/edit/{id}', [MajorController::class, 'edit'])->name('major.edit');
Route::put('/majors/update/{id}', [MajorController::class, 'update'])->name('major.update');
Route::delete('/majors/delete/{id}', [MajorController::class, 'destroy'])->name('major.destroy');
