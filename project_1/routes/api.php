<?php

use App\Http\Controllers\api\CatApiController;
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
Route::post('create_cat',[CatApiController::class, 'create_cat']);
Route::get('get_cat',[CatApiController::class, 'get_cat']);
Route::get('cat_detail/{id}',[CatApiController::class, 'cat_detail']);
Route::put('update_cat/{id}',[CatApiController::class, 'update_cat']);
Route::delete('delete_cat/{id}',[CatApiController::class, 'delete_cat']);


// Receive Project-1 data
Route::post('receive_and_create',[Receive_cat_Controller::class, 'receive_project2_data']);
