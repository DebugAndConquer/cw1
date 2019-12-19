<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment_content','user_id','like_count'
    ];

    /**
     * Return the user who wrote the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Return the post associated with the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
