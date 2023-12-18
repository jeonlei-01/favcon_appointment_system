<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'request_id' =>  $this->faker->randomDigitNotNull(),
            'service_id' => $this->faker->randomDigitNotNull(),
            'date' =>  $this->faker->date(),
            'start_time' =>  $this->faker->time(),
            'end_time' =>  $this->faker->time(),
            'name' =>  $this->faker->name(),
            'email' =>  $this->faker->email(),
            'address' =>  $this->faker->address(),
            'phone_no' =>  $this->faker->phoneNumber(),
            'notes' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit ipsam nobis repellat eius, odio quod quaerat veniam quo et consequuntur ratione ut cumque sed facere, voluptatem quibusdam commodi sequi. Non.",
        ];
    }
}
