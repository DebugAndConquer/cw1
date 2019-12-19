<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Comment;
        $a->post_id = 1;
        $a->comment_content = "I have no friends, so I will comment on my own post :(";
        $a->user_id = 1;
        $a->like_count = 0;
        $a->save();

        factory(\App\Comment::class, 8)->create();
    }
}
