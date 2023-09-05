<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Major;
use App\Models\Doctor;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        $majors = Major::get();
        $doctors = Doctor::get();
        $bookings = Booking::get();
        $users = User::get();

        return view ('admin.home', compact('majors', 'doctors', 'bookings', 'users'));
    }
}
