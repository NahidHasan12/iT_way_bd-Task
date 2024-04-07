<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CatApiController extends Controller
{
    // create category function
    public function create_cat(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'cat_name' => ['required'],
                'time' => ['required']
            ]);
            if($validator->fails()){
                $result = array('status' => false, 'message' => 'Validation Error', 'error_message' => $validator->errors());
                return response()->json($result, 400);
            }

            $category = Category::create([
                'name' => $request->cat_name,
                'time' => $request->time,
            ]);

            if($category){
                if($category){
                    $result = array('status' => true, 'message' => 'category Created', 'data' => $category);
                    $response_code = 200;
                }else{
                    $result = array('status' => false, 'message' => 'Something went wrong');
                    $response_code = 400;
                }
                return response()->json($result, $response_code);
            }
        }catch(Exception $e){
            $result = array('status' => false, 'message' => 'Api Failed', 'error' => $e->getMessage());
            return response()->json($result, 500);
        }
    }
    // get category function
    public function get_cat(){
        try{
            $category = Category::all();
            $result = array('status' => true, 'message' => $category->count().' Categories are fatch', 'data' => $category);
            return response()->json($result, 200);
        }catch(Exception $e){
            $result = array('status' => false, 'message' => 'Api Failed', 'error' => $e->getMessage());
            return response()->json($result, 500);
        }
    }
    //  category detail function
    public function cat_detail($id){
        try{
            $category = Category::findOrFail($id);
            if(!$category){
                return response()->json(['status'=>false, 'message'=>'Invalid Categry ID'], 404);
            }
            $result = array('status' => true, 'message' => ' Category Found', 'data' => $category);
            return response()->json($result, 200);
        }catch(Exception $e){
            $result = array('status' => false, 'message' => 'Api Failed', 'error' => $e->getMessage());
            return response()->json($result, 500);
        }
    }

    //update_user Function
    public function update_cat(Request $request, $id){
        try{
            $category = Category::findOrFail($id);
            if(!$category){
                return response()->json(['status'=>false, 'message'=>'Invalid Category ID'], 404);
            }

            $validator = Validator::make($request->all(), [
                'cat_name' => ['required'],
                'time' => ['required']
            ]);

            if($validator->fails()){
                $result = array('status' => false, 'message' => 'Validation Error', 'error_message' => $validator->errors());
                return response()->json($result, 400);
            }

            $category->update([
                'name' => $request->cat_name,
                'time' => $request->time,
            ]);

            if($category){
                $result = array('status' => true, 'message' => 'Category updated', 'data' => $category);
                $response_code = 200;
            }else{
                $result = array('status' => false, 'message' => 'Something went wrong');
                $response_code = 400;
            }
            return response()->json($result, $response_code);


        }catch(Exception $e){
            $result = array('status' => false, 'message' => 'Api Failed', 'error' => $e->getMessage());
            return response()->json($result, 500);
        }
    }

    // delete_user Function
    public function delete_cat($id){
        try{
            $category = Category::findOrFail($id);
            if(!$category){
                return response()->json(['status'=>false, 'message'=>'Invalid Category ID'], 404);
            }
            $category->delete();
            $result = array('status' => true, 'message' => ' User Deleted', 'data' => $category);
            return response()->json($result, 200);
        }catch(Exception $e){
            $result = array('status' => false, 'message' => 'Api Failed', 'error' => $e->getMessage());
            return response()->json($result, 500);
        }
    }
}
