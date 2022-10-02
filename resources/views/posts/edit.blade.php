@extends('layouts.layout')
@section('content')
    <div class="container mt-5 py-3">
        <h2 class="text-center">Multiple image Update</h2>
        <div class="row">
            <div class="col-md-4">
                <h5>Cover</h5>
                <form action="/deletecover/{{$post->id}}" method="POST">
                    @csrf
                
                    @method('DELETE')
                
                    <button type="submit" class="btn btn-danger btn-block">X</button>
                </form>
                <img src="/cover/{{$post->cover}}" class="img-respnsive" style="max-width:150px;" alt=""><br>
                <h5>Images</h5>                
               @if (count($post->Image) > 0)
                @foreach ($post->Image as $item)
                {{-- <div class="position-relative d-inline"> --}}
                    <form action="/deleteimage/{{$item->id}}" method="POST">
                        @csrf
                    
                        @method('DELETE')
                    
                        <button type="submit" class="btn btn-danger">X</button>
                    </form>
                    <img src="/images/{{$item->image}}" class="img-responsive" style="max-width:120px;"  alt="">
                @endforeach
               @endif
            </div>
            <div class="col-md-8">
                <form action="/update/{{$post->id}}" method="POST" enctype="multipart/form-data">
                    {{-- <form action="{{route('posts.update'), $post->id}}" method="POST" enctype="multipart/form-data"> --}}
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <b><label for="title" class="form-label">Title</label></b>
                        <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
                    </div>
                    <div class="mb-3">
                        <b><label for="description" class="form-label">Description</label></b>
                        <textarea class="form-control" id="description" name="description" >{{$post->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <b><label for="formFile" class="form-label">Cover</label></b>
                        <input class="form-control" type="file" id="formFile" name="cover">
                      </div>
                      <div class="mb-3">
                        <b><label for="formFileMultiple" class="form-label">Image</label></b>
                        <input class="form-control" type="file" id="formFileMultiple" name="images[]" multiple>
                      </div>
                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection