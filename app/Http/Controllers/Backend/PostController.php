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
        $all_data = Post::where('trash', false)->latest()->get();
        return view('Backend.post.view', [
            'all_data' => $all_data,
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
     * Category update
     */
    public function update(Request $request){
        $data = Category::find($request->id);
        if($data != null){
            $data->parent_id = $request->parent_id;
            $data->name = $request->name;
            $data->slug = str_replace(' ', '-', $request->name);
            $data->update();

            return response()->json([
                'success' => 'Category updated successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'Category not found! '
            ]);
        }
    }

    /**
     * Category status update
     */
    public function statusUpdate(Request $request){
        $data = Category::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        if($data == true){
            return response()->json([
                'success' => 'Category Status updated successfully ): '
            ]);
        }else {
         return response()->json([
             'error' => 'Something is wrong! plase try again! '
         ]);
        }
     }


    /**
     * Category trash list
     */
    public function trashList(){
        $all_data = Category::where('trash', 1)->latest()->get();
        return view('backend.category.trash-list', [
            'all_data' => $all_data
        ]);
    }


    /**
     * Category trash update
     */
    public function trashUpdate(Request $request){
        $data = Category::where('id', $request->id)->update([
            'trash' => $request->trash,
        ]);

        if($data == true){
            return response()->json([
                'msg' => 'Category trash updated successfully ): '
            ]);
        }else {
         return response()->json([
             'msg' => 'Something is wrong! plase try again! '
         ]);
        }
     }

     /**
      * Category destroy
      */
      public function destroy($id){
          $data = Category::find($id);

            if($data != null){
                $data->delete();

                return redirect()->back()->with('success', 'Category delete successfully ):');
            }else {
                return redirect()->back()->with('error', 'Something is wrong! plase try again!');

            }
      }
}
