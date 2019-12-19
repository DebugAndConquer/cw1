@extends('layouts.app')
@section('content')

<h1>Edit a Post</h1>
{{-- a Patch request is sent when the post is about to be edited --}}
<form method="POST" action="/{{$post->id}}" enctype="multipart/form-data">
    {{method_field('PATCH')}}
    @csrf
    <div class="form-group row">
        <label for="title" class="col-sm-3 col-form-label">Post Title</label>
        <div class="col-sm-9">
            <input name="title" type="text" class="form-control" id="title" placeholder="Post Title"
                value="{{$post->post_title}}" required>
        </div>
         {{-- Secretly sends the logged in user id with the post request --}}
        <input hidden class="form-control" type="text" value="{{Auth::id()}}" name="getCurId">
    </div>
    <div class="form-group row">
        <label for="content" class="col-sm-3 col-form-label">Post Content</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="content" name="content" placeholder="Say Something!"
                required>{{$post->post_content}}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="img" class="col-sm-3 col-form-label">Image</label>
        <div class="col-sm-9">
            <input name="img" type="file" id="img" class="btn btn-dark">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button name="submit" id="submit" type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-light" href="{{route('index')}}">Discard</a>
        </div>
    </div>
    {{-- All validation errors will be displayed here--}}
    <div class="alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</form>
{{-- DELETE request will be used to erase the post --}}
<form method="POST" action="/{{$post->id}}" style="text-align: right;">
    {{method_field('DELETE')}}
    @csrf
    <button name="submit" id="submit" type="submit" class="btn btn-danger">Delete This Post</button>
</form>

@endsection