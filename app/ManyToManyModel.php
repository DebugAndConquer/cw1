<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManyToManyModel extends Model
{
    // This model is not used in an application but is implemented to demonstrate that I know how to design a Many-Many relationship in Laravel
    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
