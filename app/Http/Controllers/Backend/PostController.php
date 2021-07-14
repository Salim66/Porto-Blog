<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Post list view
     */
    public function view(){
//        $all_data = Post::where('trash', false)->latest()->get();
        return view('Backend.post.view');
    }

    /**
     * Post list view by ajax
     */
    public function viewDataByAjax(){
        $all_data = Post::with('categories')->with('tags')->with('user')->where('trash', false)->latest()->get();
        $count    = Post::where('trash', true)->count();
        return response()->json([
            'all_data' => $all_data,
            'count' => $count
        ]);
    }

    /**
     * Post add page
     */
    public function add(){
        $all_category = Category::where('trash', 0)->where('status', 1)->latest()->get();
        $all_tag = Tag::where('trash', 0)->where('status', 1)->latest()->get();
        return view('Backend.post.add', [
            'all_category' => $all_category,
            'all_tag'      => $all_tag
        ]);
    }

    /**
     * Post store
     */
    public function store(Request $request){

        //post image
        $image_unique_name = '';
        if($request->hasFile('post_image')){
            $image = $request->file('post_image');
            $image_unique_name = md5(time().rand()) .'.'. $image->getClientOriginalExtension();
            // get extension
            $extension = pathinfo($image_unique_name, PATHINFO_EXTENSION);
            $valid_extesion = array('jpg', 'jpeg', 'png', 'gif');
            if(in_array($extension, $valid_extesion)){
                $image->move(public_path('uploads/posts/'), $image_unique_name);
            }else {
                return response()->json([
                    'error' => 'Invalid file format! '
                ]);
            }
        }

        //post gallery image
        $gallery_image_u_n = [];
        $gallery_image = $request->hasFile('post_gallery_image');
        if($gallery_image != NULL){
            $g_image = $request->file('post_gallery_image');
            foreach ($g_image as $image){
                $gallery_image_unique_name = md5(time().rand()) .'.'. $image->getClientOriginalExtension();
                // get extension
                $extension = pathinfo($gallery_image_unique_name, PATHINFO_EXTENSION);
                $valid_extesion = array('jpg', 'jpeg', 'png', 'gif');
                if(in_array($extension, $valid_extesion)){
                    array_push($gallery_image_u_n, $gallery_image_unique_name);
                    $image->move(public_path('uploads/posts/'), $gallery_image_unique_name);
                }else {
                    return response()->json([
                        'error' => 'Invalid file format! '
                    ]);
                }
            }
        }

        // featured information
        $post_featured = [
            'post_type'    => $request->post_type,
            'post_image'   => $image_unique_name,
            'post_gallery' => $gallery_image_u_n,
            'post_audio'   => $request->post_audio,
            'post_video'   => $this->getVideo($request->post_video),
        ];



        $data = Post::create([
            'user_id'       => Auth::id(),
            'title'         => $request->title,
            'slug'          => $this->getSlug($request->title),
            'content'       => $request->content,
            'featured'      => json_encode($post_featured),
        ]);

        $data->categories()->attach($request->category_id);
        $data->tags()->attach($request->tag_id);

        if($data == true){
            return response()->json([
                'success' => 'Post added successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'Sorry! do not added data! '
            ]);
        }
    }

    /**
     * Post edit page
     */
    public function edit($id){
        $data = Post::find($id);

        //All Category
        $all_category = Category::all();

        //Selected Category
        $selected_category = $data -> categories;
        $select_cat = [];
        foreach ($selected_category as $cat){
            array_push($select_cat, $cat -> id);
        }


        $cat_list = '';
        foreach ($all_category as $category){
            if(in_array($category -> id , $select_cat)){
                $selected = 'selected';
            }else{
                $selected = '';
            }
            $cat_list .= '<option value="'.$category->id.'" '.$selected.'>'.$category->name.'</option>';
        }


        //All Tag
        $all_tag = Tag::all();

        //Selected tag
        $selected_tag = $data -> tags;
        $select_tag = [];
        foreach ($selected_tag as $tag){
            array_push($select_tag, $tag -> id);
        }


        $tag_list = '';
        foreach ($all_tag as $tag){
            if(in_array($tag -> id , $select_tag)){
                $selected = 'selected';
            }else{
                $selected = '';
            }
            $tag_list .= '<option value="'.$tag->id.'" '.$selected.'>'.$tag->name.'</option>';
        }


        return [
            'title' => $data -> title,
            'id' => $data -> id,
            'featured' => $data -> featured,
            'content' => $data -> content,
            'category_list' => $cat_list,
            'tag_list' => $tag_list,
        ];
    }

    /**
     * Post update
     */
    public function update(Request $request){
        //find post data
        $data = Post::find($request->id);
        if($data != null){

            $feature_data = json_decode($data->featured);

            //post Image
            $image_unique_name = '';
            if ($request->hasFile('post_image')) {
                $image = $request->file('post_image');
                $image_unique_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
                $extension = pathinfo($image_unique_name, PATHINFO_EXTENSION);
                $valid_extension = array('jpg', 'jpeg', 'png', 'gif');
                if (in_array($extension, $valid_extension)) {
                    $image->move(public_path('uploads/posts/'), $image_unique_name);
                } else {
                    return response()->json([
                        'error' => 'Invalid file format! '
                    ]);
                }
                if (file_exists('uploads/posts/' . $feature_data->post_image) && !empty($feature_data->post_image)) {
                    unlink('uploads/posts/' . $feature_data->post_image);
                }
            } else {
                $image_unique_name = $feature_data->post_image;
            }

            //post gallery
            $gallery_unique_name_u = [];
            if ($request->hasFile('post_gallery_image')) {
                $images = $request->file('post_gallery_image');
                foreach ($images as $image) {
                    $gallery_unique_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
                    $extension = pathinfo($gallery_unique_name, PATHINFO_EXTENSION);
                    $valid_extension = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($extension, $valid_extension)) {
                        array_push($gallery_unique_name_u, $gallery_unique_name);
                        $image->move(public_path('uploads/posts/'), $gallery_unique_name);
                    } else {
                        return response()->json([
                            'error' => 'Invalid file format! '
                        ]);
                    }
                    foreach ($feature_data->post_gallery as $gallery) {
                        if (file_exists('uploads/posts/' . $gallery) && !empty($gallery)) {
                            unlink('uploads/posts/' . $gallery);
                        }
                    }
                }
            } else {
                $gallery_unique_name_u = $feature_data->post_gallery;
            }


            $post_featured = [
                'post_type' => $request->post_type,
                'post_image' => $image_unique_name,
                'post_gallery' => $gallery_unique_name_u,
                'post_audio' => $request->post_audio,
                'post_video' => $this->getUpdateVideo($request->post_video, $feature_data),
            ];

            $data->user_id = Auth::user()->id;
            $data->title = $request->title;
            $data->slug = $this->getSlug($request->title);
            $data->content = $request->content;
            $data->featured = $post_featured;
            $data->update();

            $data->categories()->detach();
            $data->categories()->attach($request->category_id);

            $data->tags()->detach();
            $data->tags()->attach($request->tag_id);
            return response()->json([
                'success' => 'Post updated successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'Post data not found! '
            ]);
        }
    }

    // Display the specified post
    public function preview($id){
        $single_post = Post::find($id);

        $post_fet = json_decode($single_post->featured);

        return [
            'title' => $single_post->title,
            'slug' => $single_post->slug,
            'status' => $single_post->status,
            'categories' => $single_post->categories,
            'tags' => $single_post->tags,
            'content' => $single_post->content,
            'post_type' => $post_fet->post_type,
            'post_image' => $post_fet->post_image,
            'post_gallery' => $post_fet->post_gallery,
            'post_audio' => $post_fet->post_audio,
            'post_video' => $post_fet->post_video,
        ];
    }

    /**
     * Post status update
     */
    public function statusUpdate(Request $request){
        $data = Post::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        if($data == true){
            return response()->json([
                'success' => 'Post Status updated successfully ): '
            ]);
        }else {
         return response()->json([
             'error' => 'Something is wrong! plase try again! '
         ]);
        }
     }



     /**
     * Post trash list
     */
    public function trashList(){
        $all_data = Post::where('trash', 1)->latest()->get();
        return view('backend.post.trash-list', [
            'all_data' => $all_data
        ]);
    }


    /**
     * Post trash update
     */
    public function trashUpdate(Request $request){
        $data = Post::where('id', $request->id)->update([
            'trash' => $request->trash,
        ]);

        if($data == true){
            return response()->json([
                'success' => 'Post trash updated successfully ): '
            ]);
        }else {
         return response()->json([
             'error' => 'Something is wrong! plase try again! '
         ]);
        }
     }

     /**
      * Post destroy
      */
      public function destroy($id){
          $data = Post::find($id);

            if($data != null){

                $data->categories()->detach();
                $data->tags()->detach();

                $data->delete();

                return redirect()->back()->with('success', 'Post delete successfully ):');
            }else {
                return redirect()->back()->with('error', 'Something is wrong! plase try again!');

            }
      }
}
