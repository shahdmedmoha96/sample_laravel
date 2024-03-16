<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts',[Controller::class , 'index'])->name('posts.index');
// Route::get('/test',function(){
//     return view(('test'));
// });
Route::get('/posts/create',[Controller::class , 'create'])->name('posts.create');
Route::get('/posts/search',[Controller::class , 'search'])->name('posts.search');
Route::get('/posts/comment',[Controller::class , 'comment'])->name('posts.comment');

 Route::post('/posts/store',[Controller::class , 'store'])->name('posts.store');
 Route::get('/posts/{post}/edit',[Controller::class , 'edit'])->name('posts.edit');
 Route::put('/posts/{post}',[Controller::class , 'updata'])->name('posts.updata');
 Route::delete('/posts/{post}',[Controller::class , 'destory'])->name('posts.destory');
Route::get('/posts/{post}',[Controller::class , 'show'])->name('posts.show');


