<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Category Route
Route::get('/category', [CategoryController::class, 'index'])->name('table');
Route::get('/category/show_form', [CategoryController::class, 'show_form'])->name('show_form');
Route::post('/category/add_categry', [CategoryController::class, 'add_categry'])->name('add_categry');
Route::get('/category/edit_category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');
Route::put('/category/update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
Route::get('/category/delete_category/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');
