<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => User::all()->random()->name,
            'email' => User::all()->random()->email,
            'website' => $this->faker->text,
            'comment' => $this->faker->text,
            'post_id' => Posts::all()->random()->id,
           ];
    }
}
