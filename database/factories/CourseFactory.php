<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = 2;
        return [
            'title' => fake()->name(),
            'instructorId' =>  $id++,
            'category' => fake()->word(),
            'description' => fake()->paragraph(),
        ];
    }
}
