<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Category list view
     */
    public function view(){
        $all_data = Category::where('status', true)->latest()->get();
        return view('Backend.category.view', [
            'all_data' => $all_data
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
}
