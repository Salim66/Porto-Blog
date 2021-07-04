<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin login and registration page
     */
    public function adminRegisterLogin(){
        return view('Backend.users.login');
    }

    /**
     * Admin dashbaord
     */
    public function adminDashboard(){
        return view('Backend.dashboard.index');
    }
}
