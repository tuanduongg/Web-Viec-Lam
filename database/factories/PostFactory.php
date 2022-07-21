<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post =  [
            'user_id' => $this->faker->randomElement(User::where('role','1')->pluck('id')),
            'city' => $this->faker->city,
            'remote' => $this->faker->randomElement([0,1]),
            'parttime' => $this->faker->randomElement([1,0]),
            'language' => $this->faker->randomElement(['C/C++','Java/SpingBoot','Csharp/DotNet','Js/NodeJs','PHP','Laravel','PyThon','Ruby','ReactNative','AI','Html/Css/Javascript']),
            'job_tittle' => $this->faker->text($maxNbChars = 30),
            'salary' => $this->faker->numberBetween($min = 5, $max = 50) . '000000', 
            'description' => $this->faker->paragraph(), 
            'number_applicants' => $this->faker->numerify('###'),
            'status' =>  $this->faker->randomElement([0,1,2]),  
        ];
        $temp = '';
        $post['remote'] == 1 ? $temp = ' Có Remote' : $temp;
        $post['job_tittle'] = 'Tuyển Lập Trình Viên '. $post['language'] . $temp . ' Tại '.$post['city'];
        return $post;
    }
}
