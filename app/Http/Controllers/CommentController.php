<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Gets the list of all comments in a json format
     */
    public function index(Post $post)
    {
        return response()->json($post->comments()->with('user')->latest()->get());
    }

    /**
     * Creates a new comment and stores it in the db
     */
    public function store(Post $post, Request $request) {       
        $comment = $post->comments()->create([
            'comment_content' => $request->comment_content,
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'like_count' => $post->like_count
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();

        return $comment->toJson();
    }

    /**
     * Returns a comments page view with the information about the post which holds those comments
     */
    public function welcome($id)
    {   $post = Post::find($id);
        return view('comments',compact('post'));
    }
    /**
     * Saves the comment with the newly edited data
     */
    public function update($pid, $cid, Request $request) {
        $comment = Comment::find($cid);
        $comment->comment_content = $request->comment_content;
        $comment->save();
    }
    /**
     * Deletes a comment from the db
     */
    public function delete($pid, $cid) {
        $comment = Comment::find($cid);
        $comment->delete();
    }
    /**
     * Gets the id of the comment specified in a url
     */
    public function get($pid, $cid) {
        $comment = Comment::find($cid);
        return $comment;
    }
}
