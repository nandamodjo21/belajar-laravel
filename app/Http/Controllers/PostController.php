<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    
    public function index(){

       $title = '';


       if(request('category')){
        $category = Category::firstWhere('slug',request('category'));

        $title = ' in' . $category->name;
       }

       if(request('author')){
        $author = User::firstWhere('username', request('author'));
        $title = ' by' . $author->name;

       }
       
       
        return view('blog',[
            "title" => "All Post " . $title,
            "active" => 'post',
            "posts" => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString()
        ]);
        // dd(request('search'));
    }
    public function show(Post $post){
        return view('post',[
            "title" => "Single Post",
            "active" => 'post',
            "post" => $post
        ]);
    }

    public function categories(){
        return view('categories',[
            'title' => 'Post Categories',
            'active' => 'categories',
            'categories' => Category::all()
        ]);
       

    }


}