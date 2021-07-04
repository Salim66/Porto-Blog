<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Admin Register Login page
     */
    public function adminRegisterLogin(){
        return view('Backend.users.login');
    }


    /**
     * Admin dashboard show
     */
    public function adminDashboard(){
        return view('Backend.dashboard.index');
    }
}
