<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Comment store
     */
    public function commentStore(Request $request){
        Comment::create([
            'post_id' => $request-> post_id,
            'user_id' => Auth::id(),
            'text'    => $request->text
        ]);

        return response()->json([
            'success' => 'Comment added successfully'
        ]);
    }

    /**
     * Show all comments
     */
    public function commentShowAll($id){
        $comment = Comment::with('user')->where('post_id', $id)->latest()->get();
        $comment_reply = Comment::with('user')->where('comment_id', '!=', null)->get();

        $auth = Auth::check();

        $route = route("user.login");
//        return response()->json($all_data);
        return response()->json([
            'comment'       => $comment,
            'comment_reply' => $comment_reply,
            'auth'          => $auth,
            'route'          => $route,
        ]);



    }

    /**
     * Reply comment store
     */
    public function commentReplyStore(Request $request){
        Comment::create([
            'post_id'    => $request-> post_id,
            'user_id'    => Auth::id(),
            'comment_id' => $request->comment_id,
            'text'       => $request->text
        ]);

        return response()->json([
            'success' => 'Comment reply successfully'
        ]);
    }
}

// {{-- <li>
//     <div class="comment">
//         <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
//             <img class="avatar" alt="" src="img/avatars/avatar-3.jpg">
//         </div>
//         <div class="comment-block">
//             <div class="comment-arrow"></div>
//             <span class="comment-by">
//                 <strong>John Doe</strong>
//                 <span class="float-end">
//                     <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
//                 </span>
//             </span>
//             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
//             <span class="date float-end">January 12, 2021 at 1:38 pm</span>
//         </div>
//     </div>
// </li>
// <li>
//     <div class="comment">
//         <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
//             <img class="avatar" alt="" src="img/avatars/avatar-4.jpg">
//         </div>
//         <div class="comment-block">
//             <div class="comment-arrow"></div>
//             <span class="comment-by">
//                 <strong>John Doe</strong>
//                 <span class="float-end">
//                     <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
//                 </span>
//             </span>
//             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
//             <span class="date float-end">January 12, 2021 at 1:38 pm</span>
//         </div>
//     </div>
// </li> --}}
