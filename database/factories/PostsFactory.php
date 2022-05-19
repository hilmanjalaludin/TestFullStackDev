<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'content' => $this->faker->text,
            'slug' => $this->faker->slug,
            'user_id' => User::all()->random()->id,
           ];
    }
}
