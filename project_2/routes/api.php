<?php

use App\Http\Controllers\api\Cat_api_Conroller;
use App\Http\Controllers\api\Receive_cat_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// category routes
Route::post('create_cat2',[Cat_api_Conroller::class, 'create_cat']);
Route::get('get_cat2',[Cat_api_Conroller::class, 'get_cat']);
Route::get('cat_detail2/{id}',[Cat_api_Conroller::class, 'cat_detail']);
Route::put('update_cat2/{id}',[Cat_api_Conroller::class, 'update_cat']);
Route::delete('delete_cat2/{id}',[Cat_api_Conroller::class, 'delete_cat']);

// Receive Project-2 data
Route::post('receive_and_create',[Receive_cat_Controller::class, 'receive_project1_data']);
