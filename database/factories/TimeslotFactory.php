<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timeslot>
 */
class TimeslotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Timeslot::class;
    public function definition(): array
    {
        return [
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'status' => 'Active',
            'schedule_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
