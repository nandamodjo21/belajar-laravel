<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view('dashboard.posts.index',[
        'title' => 'Welcome to Youre Post',
        'data' => Category::all(),
        'posts' => Post::where('user_id', auth()->user()->id)->get()
        
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'title' => 'Create Post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // ddd($request);


        // return $request->file('image')->store('post-images');

        $validasi = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required',
        ]);

        if($request->file('image')){
            $validasi['image'] = $request->file('image')->store('post-image');
        }
        $validasi['user_id'] = auth()->user()->id;
        $validasi['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validasi);
        // $request->session()->flash('success','data berhasil ditambahkan');
        return redirect('/dashboard/posts')->with('success','data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'title' => 'Single Post',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        // dd($post);
        return view('dashboard.posts.edit',[
            'title' => 'Edit Post',
            'data' => Category::all(),
            'posts' => [$post]


            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required',
        ];

       

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

       
        $validasi = $request->validate($rules);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validasi['image'] = $request->file('image')->store('post-image');
        }
        $validasi['user_id'] = auth()->user()->id;
        $validasi['excerpt'] = Str::limit($request->body, 200);

        Post::where('id',$post->id)
            ->update($validasi);
        // $request->session()->flash('success','data berhasil ditambahkan');
        return redirect('/dashboard/posts')->with('success','data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success','data berhasil dihapus');
    }

    public function checkSlug(Request $request){
        
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}