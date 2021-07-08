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

    /**
     * Frontend single blog page
     */
    public function singleBlog($slug){
        $data = Post::where('slug', $slug)->first();
        // single post views count method
        $this->viewCount($data->id);
        return view('Frontend.single-blog', [
            'data' => $data
        ]);
    }

    /**
     * Signle post count method
     */
    private function viewCount($post_id){
        $data = Post::find($post_id);
        $old_view = $data->views;
        $data->views = $old_view + 1;
        $data->update();
    }
}
