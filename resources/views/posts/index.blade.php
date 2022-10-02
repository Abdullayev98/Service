@extends('layouts.layout')
@section('content')
    <div class="container mt-5">
      <div class="mt-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}    
            </div>     
        @endif
      </div>

        <h2 class="text-center">Welcome Multiple images</h2>
        <a href="/create"><button class="btn btn-primary"> Add new</button></a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Cover</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post )
              <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td><img src="cover/{{$post->cover}}" class="img-respnsive" style="max-height:100px; max-width:100px;" alt=""></td>
                <td><a href="/edit/{{$post->id}}" class="btn btn-outline-primary">Update</a></td>
                <td>
                <form action="/delete/{{$post->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Are you sure ???') " class="btn btn-danger btn-block">Delete</button>
                </form></td>
                {{-- <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-outline-primary">Update</a></td>
                <td><form action="{{route('posts.destroy', $post->id)}}" method="POST">
                  @csrf
              
                  @method('DELETE')

                  <button type="submit" onclick="return confirm('Are you sure ???') " class="btn btn-danger btn-block">Delete</button>
              </form></td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection