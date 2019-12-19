@extends('layouts.app')
@section('content')
<div class="card" id="app">
    {{-- Validation errors will appear on the top the feed --}}
    @if($errors->any())
    <div class="alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(sizeof($posts) !== 0)
    {{-- Iterating through every post and displaying each of them in the feed --}}
    @foreach ($posts as $post)
    <div class="container">
        <div class="card mt-3 ml-3 mr-3 mb-5"
            style="border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; border-bottom:1px solid black;">
            <div class="card-header">
                <h2>{{$post->post_title}}</h2>
            </div>
            <div class="card-body">
                <h5>{{$post->post_content}}</h5>
            </div>
            {{-- If the post contains an image it will be displayed --}}
            @if(null !== ($post->image))
            <div class="card-footer">

                <img class="card-img-top" src="{{Storage::url($post->image)}}" alt="">
            </div>
            @endif
            <div class="card" style="border-left:0px; border-right:0px; border-top:0px;">
                <div class="card-footer">
                    <h6 style="text-align:right">Posted by: {{$post->user->name}} on {{$post->user->created_at}}&nbsp
                    </h6>
                </div>
            </div>
            {{-- Editing/Deleting options are only available for the creators of the post --}}
            @if (Auth::id() == $post->user->id)
            <div class="col-lg-12 text-center">
                {{-- Navigate to edit page view on the button click --}}
                <button type="button" class="btn btn-link" onclick="location.href = '/{{$post->id}}/edit';">Edit
                    Post</button>
                {{-- Using a Delete request to erase the post --}}
                <form method="POST" action="/{{$post->id}}">
                    {{method_field('DELETE')}}
                    @csrf
                    <button name="submit" id="submit" type="submit" class="btn btn-link">Delete This Post</button>
                </form>
            </div>
            @endif
            {{-- Navigate to a post comments view when the button is clicked --}}
            <a class="btn btn-dark" href="{{route('commWelcome',$post)}}">View Comments</a>
        </div>
    </div>
    @endforeach
    @else
    <h1 align="center">NO POSTS YET</h1>
    @endif
</div>
@endsection