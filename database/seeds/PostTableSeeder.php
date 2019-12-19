<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Post;
        $a->post_content = "I am Jack and I am cool :)";
        $a->user_id = 1;
        $a->like_count = 4;
        $a->post_title = "Post";
        $a->image = "/......";
        $a->save();

        factory(\App\Post::class, 8)->create();
    }
}
