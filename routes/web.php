<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumasController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;


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

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::resource('/forum', 'ForumasController');
Route::get('/', [FrontendController::class, 'index']);
// Route::resource('/forum',ForumasController::class);
// Route::resource('/forum',ForumasController::class);

// Route::get('/forum', [ForumasController::class, 'index']);
Route::get('/forum/create', [ForumasController::class, 'create']);
Route::resource('comment','CommentController',['only'=>['update','destroy']]);
Route::post('comment/create/{forum}',[CommentController::class,'addThreadComment'])->name('threadcomment.store');
Route::post('comment/like',[LikeController::class,'toggleLike'])->name('toggleLike');
Route::post('reply/create/{comment}',[CommentController::class,'addReplyComment'])->name('replycomment.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart', [CartController::class, 'addProduct']);

Route::middleware(['auth'])->group(function () {
  
    Route::get('checkout', [CheckoutController::class, 'index']);
 });

 Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');

    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-prod/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    Route::get('delete-category/{id}',[CategoryController::class,'destroy']);
 }); 
