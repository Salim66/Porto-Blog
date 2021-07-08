<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Comment store
     */
    public function commentStore(Request $request){
        return $request->all();
    }
}
