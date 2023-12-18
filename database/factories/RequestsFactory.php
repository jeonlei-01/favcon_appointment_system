<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Request::class;

    public function definition(): array
    {
        return [
            'start_time' =>  $this->faker->time(),
            'end_time' =>  $this->faker->time(),
            'status' => 'Active',
        ];
    }
}
