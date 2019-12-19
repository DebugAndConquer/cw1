@extends('layouts.app')

@section('content')

<h2>Create a Post</h2>

<form method="post" action="{{action('MainController@store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="title" class="col-sm-3 col-form-label">Post Title</label>
        <div class="col-sm-9">
            <input name="title" type="text" class="form-control" id="title" placeholder="Post Title"
                value="{{old('title')}}" required>
        </div>
        {{-- Secretly sends the logged in user id with the post request --}}
        <input hidden class="form-control" type="text" value="{{Auth::id()}}" name="getCurId">
    </div>
    <div class="form-group row">
        <label for="content" class="col-sm-3 col-form-label">Post Content</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="content" name="content" placeholder="Say Something!"
                required>{{old('content')}}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="image" class="col-sm-3 col-form-label">Image</label>
        <div class="col-sm-9">
            <input name="image" type="file" id="image" class="btn btn-dark">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button name="submit" id="submit" type="submit" class="btn btn-dark">Submit</button>
            <a class="btn btn-light" href="{{route('index')}}">Discard</a>
        </div>
    </div>
{{-- If any validation errors are spotted they will be displayed to a user --}}
    <div class="alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</form>


@endsection