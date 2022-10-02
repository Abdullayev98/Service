@extends('layouts.layout')
@section('content')

    <div class="container mt-5">
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach    
            </ul>  
        </div> 
        @endif --}}
        <h2 class="text-center">Multiple image Store</h2>
        <form action="/create" method="POST" enctype="multipart/form-data">
        {{-- <form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data"> --}}

            @csrf
            <div class="mb-3">
                <b><label for="title" class="form-label">Title</label></b>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title">
                <span style="color: red" >@error('title'){{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <b><label for="description" class="form-label">Description</label></b>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" > {{ old('description') }}</textarea>
                <span style="color: red" >@error('description'){{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <b><label for="formFile" class="form-label">Cover</label></b>
                <input class="form-control" type="file" id="formFile" name="cover">
                <span style="color: red">@error('cover'){{$message}} @enderror</span>

              </div>
              <div class="mb-3">
                <b><label for="formFileMultiple" class="form-label">Image</label></b>
                <input class="form-control" type="file" id="formFileMultiple" name="images[]" multiple>
                <span style="color: red" >@error('images'){{$message}} @enderror</span>
                <span style="color: red" >@error('images.*'){{$message}} @enderror</span>
              </div>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
@endsection