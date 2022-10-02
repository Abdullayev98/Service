<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Image;
use App\Service\CrudPosts;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index()
    {
        //ONE ###################################===============##############################
        $posts = Post::all();
        if ($posts)
            return response()->json([
                'message' => 'Data was taken from Database',
                'success' => true,
                'data' => $posts
            ]);
        return response()->json([
            'message' => 'Something wrong',
            'success' => false,
        ]);

        //TWO ###################################===============##############################
        // return response()->json($posts);
        
        //Three ###################################===============##############################
        // try {
            
        //     $posts = Post::all();
        //     return response(['user' => auth()->user(), 'data'=>$posts]);
        // } catch (ValidationException $e) {
        //     return response()->json(array_values($e->errors()));
        // }
        
        //FOUR ###################################===============##############################
        // $posts = Post::all();
        // if($posts){
        //      return response()->json(["posts" => $posts],200);
        //     }
        // else{
        //     return response()->json(["message" => "Nimadir xato"],404);
        // }

        //FIVE ###################################===============##############################
        // try {
        //     $posts = Post::find(5);
        // } catch (Exception $e) {
              
        //     $message = $e->getMessage();
        //     var_dump('Exception Message: '. $message);
  
        //     $code = $e->getCode();       
        //     var_dump('Exception Code: '. $code);
  
        //     $string = $e->__toString();       
        //     var_dump('Exception String: '. $string);
  
        //     exit;
        // }
        //   return response()->json($posts);

        //SIX ###################################===============##############################
        // return response([
        //     'message' => 'New object was created successfully!!!',
        //     'object' => $objects
        // ], Response::HTTP_OK);
    }

    public function store(PostRequest $request){
        // // validator
        // $validator = Validator::make($request->all(), [
        //         'title' => 'required|max:25|min:5|string',
        //         'description' => 'required|min:5',
        //         'cover' => 'required|image|mimes:png,jpg', //size:2048,
        //         'images' => 'required|array',
        //         'images.*' => 'required|image|mimes:png,jpg',
        //     ], [
        //         'title.required' => 'Please enter title',
        //         'title.min' => 'Please enter title more than 5 letters ',
        //         'title.max' => 'Please enter title less than 25 letters ',
        //         'title.string' => 'Please enter title only letters ',
        //         'description.required' => 'Please enter description',
        //         'description.min' => 'Please enter title more than 5 letters ',
        //         'cover.required' => 'Please enter cover',
        //         'cover.min' => 'cover type must be jpg or png',
        //         'images.*.required' => 'Please enter images',
        //         'images.*.min' => 'images type must be jpg or png',
        //     ]);

        // check validation
        $errors = new PostRequest();
        $validator = Validator::make($request->all(), $errors->messages());
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator,
            ];
            return response()->json($response, 202);
        }
        try{
            $response = new CrudPosts();
            $response->store($request);
            return response()->json(['status' => true, 'message' => 'Posts data saved!!!']);
        } catch (ValidationException $e) {
            return response()->json(array_values($e->errors()));
        }
    }
    public function update(Request $request, $id)
    {   
        try{
            $response = new CrudPosts();
            $response->update($request,$id);
            return response()->json(['status' => true, 'message' => 'Posts data updated!!!']);
        } catch (ValidationException $e) {
            return response()->json(array_values($e->errors()));
        }
           
    }
    public function destroy($id)
    {
        try{
            $response = new CrudPosts();
            $response->destroy($id);
            return response()->json(['status' => true, 'message' => 'Posts data deleted!!!']);
        }
        catch (ValidationException $e) {
            return response()->json(array_values($e->errors()));
        }
    }
    
}
