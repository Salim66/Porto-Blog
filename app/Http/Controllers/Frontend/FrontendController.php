<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Frontend index page load
     */
    public function index(){
        // $all_data = P
        return view('Frontend.index');
    }
}
