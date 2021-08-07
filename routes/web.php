<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Category\indexController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///login by Admin
Route::get('/admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/users/login/store',[LoginController::class,'store']);



Route::middleware(['auth'])->group(function () {
  Route::prefix('admin')->group(function () {
    Route::get('/main',[MainController::class,'index'])->name('admin.main');


    //---MENU--------//
    Route::prefix('menus')->group(function(){
      Route::get('add',[MenuController::class,'create'])->name('admin.menus.add');
      Route::post('store',[MenuController::class,'store'])->name('admin.menus.store');
      Route::get('index',[MenuController::class,'index'])->name('admin.menus.list');
      Route::get('edit/{menu}',[MenuController::class,'edit']);
      Route::post('edit/{menu}',[MenuController::class,'update'])->name('admin.menus.update');
      Route::DELETE('destroy',[MenuController::class,'destroy']);
  });


  //------------Product---------
  Route::prefix('products')->group(function(){
   Route::get('add',[ProductController::class,'create'])->name('admin.product.create');
   Route::post('add',[ProductController::class,'store']);
   Route::get('index',[ProductController::class,'index'])->name('admin.product.list');
   Route::get('edit/{product}',[ProductController::class,'show'])->name('admin.product.edit');
   Route::post('edit/{product}',[ProductController::class,'update']);
   Route::delete('destroy',[ProductController::class,'destroy']);
  });
  Route::post('/upload/services',[UploadController::class,'store']);
});

 
});
Route::get('/', [App\Http\Controllers\MainController::class, 'index']);









  


