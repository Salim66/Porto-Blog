<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Tag list view
     */
    public function view(){
//        $all_data = Tag::where('trash', false)->latest()->get();
        return view('Backend.tag.view');
    }

    /**
     * Tag list view by ajax response
     */
    public function viewDataByAjax(){
        $all_data = Tag::where('trash', false)->latest()->get();
        $count = Tag::where('trash', true)->count();
        return response()->json([
            'all_data' => $all_data,
            'count' => $count
        ]);
    }

    /**
     * Tag add page
     */
    public function add(){
        return view('Backend.tag.add');
    }

    /**
     * Tag store
     */
    public function store(Request $request){
        $data = Tag::create([
            'name'      => $request->name,
            'slug'      => str_replace(' ', '-', $request->name)
        ]);

        if($data == true){
            return response()->json([
                'success' => 'Tag added successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'Sorry! do not added data! '
            ]);
        }
    }

    /**
     * Tag edit page
     */
    public function edit($id){
        $data = Tag::find($id);
        return response()->json($data);
    }

    /**
     * Tag update
     */
    public function update(Request $request){
        $data = Tag::find($request->id);
        if($data != null){
            $data->name = $request->name;
            $data->slug = str_replace(' ', '-', $request->name);
            $data->update();

            return response()->json([
                'success' => 'Tag updated successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'Tag not found! '
            ]);
        }
    }

    /**
     * Tag status update
     */
    public function statusUpdate(Request $request){
        $data = Tag::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        if($data == true){
            return response()->json([
                'success' => 'Tag Status updated successfully ): '
            ]);
        }else {
         return response()->json([
             'error' => 'Something is wrong! plase try again! '
         ]);
        }
     }


    /**
     * Tag trash list
     */
    public function trashList(){
        $all_data = Tag::where('trash', 1)->latest()->get();
        return view('backend.tag.trash-list', [
            'all_data' => $all_data
        ]);
    }


    /**
     * Tag trash update
     */
    public function trashUpdate(Request $request){
        $data = Tag::where('id', $request->id)->update([
            'trash' => $request->trash,
        ]);

        if($data == true){
            return response()->json([
                'success' => 'Tag trash updated successfully ): '
            ]);
        }else {
         return response()->json([
             'error' => 'Something is wrong! plase try again! '
         ]);
        }
     }

     /**
      * Tag destroy
      */
      public function destroy($id){
          $data = Tag::find($id);

            if($data != null){
                $data->delete();

                return redirect()->back()->with('success', 'Tag delete successfully ):');
            }else {
                return redirect()->back()->with('error', 'Something is wrong! plase try again!');

            }
      }
}
