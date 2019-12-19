<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        // A factory is called here to make sure the comment is associated with 
        // an existing post by creating a new one.
        'post_content' => $faker->paragraph,
        'post_title' => $faker->sentence,
        'image' => $faker->sentence,
        'user_id' => factory(\App\User::class)->create()->id,
        'like_count' => $faker->numberBetween($min = 0, $max = 150),
    ];
});
