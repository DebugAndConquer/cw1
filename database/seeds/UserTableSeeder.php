<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new User;
        $a->name = "Jack Mall";
        $a->email = "j.mall@gmail.com";
        $a->password = "jackmall";
        $a->isAdmin = true;
        $a->save();

        factory(\App\User::class, 8)->create();
    }
}
