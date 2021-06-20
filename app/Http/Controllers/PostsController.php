<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Post;
use App\Http\Requests;

use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function create(){
        return view('posts.create');
    }
    public function store(){
        $data = request()->validate([
            // 'another' => '',
            'caption' => 'required',
            'image' => ['required','image'],
        ]);
        
        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1200,1200) ;
        $image -> save();
        // $post = new post();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
        // \App\Models\Post::create($data);
        return redirect('/profile/' . auth()->user()->id);
        // dd(request()->all());
    }

    public function show(\App\Models\Post $post)
    {
        // dd($post);
        // return view('posts.show', [
        //     'post' => $post,
        // ]);
        return view('posts.show', compact('post'));
    }

}
