<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Return the author of the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Return the list of comments associated with the post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Establishes a Many-to-Many relationship with a ManyToManyModel just for the demonstration purposes
     */
    public function manyToManyModels() {
        return $this->belongsToMany('App\ManyToManyModel');
    }
}
