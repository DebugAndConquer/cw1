<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        // A factory is called here to make sure the comment is associated with 
        // an existing post by creating a new one.
        'post_id' => factory(\App\Post::class)->create()->id,
        'comment_content' => $faker->sentence,
        'user_id' => factory(\App\User::class)->create()->id,
        'like_count' => $faker->numberBetween($min = 0, $max = 20),
    ];
});
