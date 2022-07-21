<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 
        $user = [
            'name' => $this->faker->firstName . ' ' .$this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'role' => $this->faker->randomElement([0,1]),
            'password' => $this->faker->password,
        ];
        if($user['role'] === 1) { //hr
            $user['phone'] = $this->faker->numerify('09########');
            $user['address'] = $this->faker->address;
        }else {
            $user['phone'] = null;
            $user['address'] = null;
        }
        return  $user;
    }
}
