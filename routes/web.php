<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;



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



Route::get('/home', function () {
    return view('home',[
        "active" => "home",
        "title" => "Home"
    ]);
});
Route::get('/about', function () {
    return view('about',[
        "active" => "about",
        "title" => "About",
        "name" => 'nanda modjo',
        "address" => 'mootilango',
        "image" => 'nanda.jpeg'
    ]);
});

//dashboard
Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'title' => 'dashboard'
    ]);
})->middleware('auth');

//menu utama
Route::get('/blog', [PostController::class,'index']);
Route::get('/post/{post:slug}', [PostController::class,'show']);
Route::get('/categories',[PostController::class,'categories']);

//login
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

//register
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('blog',[
//         'title' => "Post by Category :$category->name",
//         'active' => 'categories',
//         'post' => $category->post->load('category','author'),
        
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){

//     return view('blog',[
//         'title' => "Post by Author : $author->name",
        
//         'post' => $author->posts->load('category','author')
//     ]);
// });