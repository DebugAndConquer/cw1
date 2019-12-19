<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OneToOneModel extends Model
{
    // This model is not used in an application but is implemented to demonstrate that I know how to design a 1-1 relationship in Laravel
    public function user() {
        return $this->hasOne('App\User');
    }
}
