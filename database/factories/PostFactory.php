<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(8) ,
            'author_id' => User::factory() , //data diambil table user 
            'category_id' => mt_rand(1,3) , 
            'slug' => Str::slug(fake()->sentence()), //str::slug digunakan untuk mengenerate string menjadi slug
            'body' => fake()->text()
        ];
    }



}
