<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Category list table view
     */
    public function view(){
        $all_data = Category::where('trash', false)->latest()->get();
        return view('Backend.category.view', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Category list table data view
     */
    public function viewDataByAjax(){
        $all_data = Category::where('trash', false)->latest()->get();
        $count = Category::where('trash', true)->count();
        return response()->json([
            'all_data' => $all_data,
            'count' => $count
        ]);
    }

    /**
     * Category add page
     */
    public function add(){
        $all_data = Category::where('parent_id', 0)->latest()->get();
        return view('Backend.category.add', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Category store
     */
    public function store(Request $request){
        $data = Category::create([
            'parent_id' => $request->parent_id,
            'name'      => $request->name,
            'slug'      => str_replace(' ', '-', $request->name)
        ]);

        if($data == true){
            return response()->json([
                'success' => 'Category added successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'Sorry! do not added data! '
            ]);
        }
    }

    /**
     * Category edit page
     */
    public function edit($id){
        $data = Category::find($id);
        return response()->json($data);
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
     * Category trash list page load
     */
    public function trashList(){
//        $all_data = Category::where('trash', 1)->latest()->get();
        return view('backend.category.trash-list');
    }

    /**
     * Category trash list data by ajax response
     */
    public function trashListByAjax(){
        $all_data = Category::where('trash', 1)->latest()->get();
        return response()->json($all_data);
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
                'success' => 'Category trash updated successfully ): '
            ]);
        }else {
         return response()->json([
             'error' => 'Something is wrong! plase try again! '
         ]);
        }
     }

     /**
      * Category destroy
      */
//      public function destroy($id){
//          $data = Category::find($id);
//
//            if($data != null){
//                $data->delete();
//
//                return redirect()->back()->with('success', 'Category delete successfully ):');
//            }else {
//                return redirect()->back()->with('error', 'Something is wrong! plase try again!');
//
//            }
//      }


    /**
     * Category destroy by ajax
     */
    public function deleteByAjax(Request $request){
        $id = $request->id;
//          return $id;
        $data = Category::find($id);

        if($data != null){
            $data->delete();

            return response()->json([
                'success' => 'Category delete successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'Something is wrong! plase try again! '
            ]);
        }
    }
}
