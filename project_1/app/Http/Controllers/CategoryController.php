<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('category.table', compact('category'));
    }

    public function show_form(){
        return view('category.add_category');
    }
    // create category function
    public function add_categry(Request $request){
        $request->validate([
            'cat_name' => ['required'],
            'time' => ['required']
        ]);

        $category = Category::create([
            'name' => $request->cat_name,
            'time' => $request->time,
        ]);

        if($category){
            return redirect()->back()->with('success','Category has Been Saved');
        }else{
            return redirect()->back()->with('error','Something Error');
        }
    }

    public function edit_category($id){
        $category = Category::findOrFail($id);
        return view('category.edit_category', compact('category'));
    }

    public function update_category(Request $request, $id){
        $category = Category::findOrFail($id);
        $request->validate([
            'cat_name' => ['required'],
            'time' => ['required']
        ]);

        $data = $category->update([
            'name' => $request->cat_name,
            'time' => $request->time,
        ]);

        if($data){
            return redirect()->back()->with('success','Category has Been Updated');
        }else{
            return redirect()->back()->with('error','Something Error');
        }
    }

    public function delete_category($id){
        $category = Category::findOrFail($id);
        $category->delete();
        if($category){
            return redirect()->back()->with('success','Category has Been Deleted');
        }else{
            return redirect()->back()->with('error','Something Error');
        }
    }


}
