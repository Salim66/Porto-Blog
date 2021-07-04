<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin dashboard show
     */
    public function adminDashboard(){
        return view('Backend.dashboard.index');
    }
}
