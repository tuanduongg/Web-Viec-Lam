<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\UserPosts;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(200)->create();
        Post::factory(1000)->create();
        UserPosts::factory(100)->create();
    }
}
