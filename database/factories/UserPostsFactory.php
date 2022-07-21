<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement(User::where('role','0')->pluck('id')),
            'post_id' => $this->faker->randomElement(Post::where('status','1')->pluck('id')),
            'status' => $this->faker->randomElement([1,2]),
        ];
    }
}
