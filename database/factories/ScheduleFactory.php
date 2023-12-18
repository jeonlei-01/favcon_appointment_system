<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    // protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'status' => 'Approved',
            // 'timeslot_id' => $this->faker->randomDigitNotNull(),
            'service_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
