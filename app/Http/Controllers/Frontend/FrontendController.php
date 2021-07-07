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
        $all_data = Post::where('status', true)->where('trash', false)->latest()->paginate(4);
        return view('Frontend.index', [
            'all_data' => $all_data
        ]);
    }
}
