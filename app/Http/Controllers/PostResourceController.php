<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $imageName =time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('cover/'), $imageName);

            $post = new Post([
                'title' => $request->title,
                'description' => $request->description,
                'cover' => $imageName,

            ]);
            $post->save();
        }
        if($request->hasFile('images'))
        {
            $files = $request->file('images');
            foreach($files as $file)
            {
                $imageName = time().'_'.$file->getClientOriginalName();
                $request['post_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move(\public_path('images/'), $imageName);
                Image::create($request->all());
            }
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->hasFile('cover')){
            if(File::exists('cover/'.$post->cover))
            {
                File::delete('cover/'.$post->cover);
            }
            $file = $request->file('cover');
            $imgName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('cover/'),$imgName);

            $post->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'cover'=>$imgName,
            ]);

        }
        if($request->hasFile('images'))
        {
            $files = $request->file('images');
            foreach($files as $file)
            {
                $imageName = time().'_'.$file->getClientOriginalName();
                $request['post_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move(\public_path('images/'), $imageName);
                Image::create($request->all());
            }
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(File::exists('cover/'.$post->cover)){
            File::delete('cover/'.$post->cover);
        };
        $images = Image::where('post_id',$post->id)->get();
        foreach($images as $item){
            if(File::exists('images/'.$item->image)){
                File::delete('images/'.$item->image);
            }
        }
        $post->delete();
        return redirect()->back();
    }
}
