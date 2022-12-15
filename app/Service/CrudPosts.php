<?php

namespace App\Service;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\File;

class CrudPosts{
    public function store($request){
        
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
            foreach($files as $file){
                $imageName = time().'_'.$file->getClientOriginalName();
                $request['post_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move(\public_path('images/'), $imageName);
                Image::create($request->all());
            }
        }
        return ;
    }
    public function update($request,$id){
        $post = Post::findOrFail($id);
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
    }
    public function destroy($id)
    {
        $post = Post::findOrFAil($id);
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
    }
}