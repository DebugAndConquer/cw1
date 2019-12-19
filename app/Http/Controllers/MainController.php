<?php

namespace App\Http\Controllers;

use App\Post;

class MainController extends Controller
{
    public function create()
    {
        return view('create');
    }
    /**
     * Saves the new post in the db
     */
    public function store()
    {
        // Will only permit entries where title is min of 5 and max of 20 symbols
        // and content is min 10 and max 255 symbols
        request()->validate([
            'title' => ['required', 'min:5', 'max:20'],
            'content' => ['required', 'min:10', 'max:255']
        ]);

        $post = new Post;
        $post->user_id = request('getCurId');
        $post->post_title = request('title');
        $post->post_content = request('content');
        if (!empty(request()->file('image'))) {
            $post->image = request()->file('image')->store('public/images');
        }
        $post->save();
        return redirect('/');
    }
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * 
     */
    /**
     * Returns the feed page view with the information about every post
     */
    public function index()
    {
        $posts = Post::latest()->get();
        //$comments = Comment::all();
        return view('welcome', compact('posts'));
    }
    /**
     * Returns the edit post page view with the information about the post which will be edited
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }
    /**
     * Stores the edited post in the db
     */
    public function update($id)
    {
        request()->validate([
            'title' => ['required', 'min:5', 'max:20'],
            'content' => ['required', 'min:10', 'max:255']
        ]);
        $post = Post::find($id);
        $post->user_id = request('getCurId');
        $post->post_title = request('title');
        $post->post_content = request('content');
        if (!empty(request()->file('img'))) {
            $post->image = request()->file('img')->store('public/images');
        }
        $post->save();
        return redirect('/');
    }
    /**
     * Deletes the post from the db
     */
    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }
}
