<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Frontend index page load
     */
    public function index(){
        $all_data = Post::where('status', true)->where('trash', false)->latest()->paginate(6);
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

    /**
     * Single user blog post
     */
    public function singleUserBlog($slug){
        $user = User::where('slug', $slug)->first();
        $all_data = Post::where('user_id', $user->id)->where('status', true)->where('trash', false)->latest()->paginate(5);
        return view('Frontend.single-user-blog', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Category wise blog search
     */
    public function categoryWiseBlogSearch($slug){
       $category = Category::where('slug', $slug)->first();
       return view('Frontend.category-wise-search', [
           'category' => $category
       ]);
    }

    /**
     * Tag wise blog search
     */
    public function tagWiseBlogSearch($slug){
       $tag = Tag::where('slug', $slug)->first();
       return view('Frontend.tag-wise-search', [
           'tag' => $tag
       ]);
    }

    /**
     * Post search by search panel
     */
    public function postSearch(Request $request){
       $search = $request->search;
       $all_data = Post::where('title', 'LIKE', '%'.$search.'%')->orWhere('content', 'LIKE', '%'.$search.'%')->paginate(5);
       return view('Frontend.search', [
           'all_data' => $all_data,
           'search' => $search,
       ]);
    }
}
