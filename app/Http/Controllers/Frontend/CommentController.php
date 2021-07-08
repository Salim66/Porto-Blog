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
    public function commentShowAll(){
        $all_data = Comment::latest()->get();


        $all_comments = '';

        foreach($all_data as $data){
            $all_comments .= '      <li>
            <div class="comment">
                <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                    <img class="avatar" alt="" src="http://localhost:8000/uploads/users/'.$data->user->photo.'">
                </div>
                <div class="comment-block">
                    <div class="comment-arrow"></div>
                    <span class="comment-by">
                        <strong>'.$data->user->name.'</strong>
                        <span class="float-end">
                            <span> <a href="#" c_id="'.$data->id.'" class="comment-reply reply-box-btn" id="reply_box_btn"><i class="fas fa-reply"></i> Reply</a></span>
                        </span>
                    </span>
                    <p>'.$data->text .'</p>
                    <span class="date float-end">'.date('M d, Y', strtotime($data->created_at)).'</span>
                </div>
            </div>


            <ul  class="comments reply">


                <form class="contact-form p-4 rounded bg-color-grey comment_reply reply-box reply-box-'.$data->id.'" id="comment_reply_store" action="" method="POST">
                <div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="hidden" name="post_id" id="post_id" value="'.$data->post_id.'">
                            <input type="hidden" name="comment_id" id="comment_id" value="'.$data->id.'">
                            <label class="form-label required font-weight-bold text-dark">Comment</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your comment." rows="1" class="form-control" id="text" name="text" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col mb-0">
                            <input type="submit" value="Reply" class="btn btn-primary btn--sm btn-modern" data-loading-text="Loading...">
                        </div>
                    </div>
                    </div>
                </form>



            </ul>
        </li>';
        }

       return $all_comments;
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
