<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Image;
use App\Service\CrudPosts;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.upload');
    }

    public function store(PostRequest $request)
    {
        // $validate = $request->validate([
        //     'title' => 'required|max:25|min:5|string',
        //     'description' => 'required|min:5',
        //     'cover' => 'required|image|mimes:png,jpg', //size:2048,
        //     'images' => 'required|array',
        //     'images.*' => 'required|image|mimes:png,jpg',
        // ], [
        //     'title.required' => 'Please enter title',
        //     'title.min' => 'Please enter title more than 5 letters ',
        //     'title.max' => 'Please enter title less than 25 letters ',
        //     'title.string' => 'Please enter title only letters ',
        //     'description.required' => 'Please enter description',
        //     'description.min' => 'Please enter title more than 5 letters ',
        //     'cover.required' => 'Please enter cover',
        //     'cover.min' => 'cover type must be jpg or png',
        //     'images.*.required' => 'Please enter images',
        //     'images.*.min' => 'images type must be jpg or png',
        // ]); 
        
        $response = new CrudPosts();
        $response->store($request);
        return redirect('/');
    }   

    public function show(Post $post)
    {
        //
    }  

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $response = new CrudPosts();
        $response->update($request,$id);
        return back();
    }

    public function destroy($id)
    {
        $response = new CrudPosts();
        $response->destroy($id);
        return redirect()->back();
    }
    public function deleteimage($id){
        $images = Image::findOrFail($id);
        if(File::exists('images/'.$images->image))
        {
            File::delete('images/'.$images->image);
        }
        $images->delete();
        return redirect()->back();
    }
    public function deletecover($id){
        $post = Post::findOrFail($id)->cover;
        if(File::exists('cover/'.$post))
        {
            File::delete('cover/'.$post);
        }
        $post->delete();
        return redirect()->back();
    }
}
