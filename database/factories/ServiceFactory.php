<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->name(),
            'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit ipsam nobis repellat eius, odio quod quaerat veniam quo et consequuntur ratione ut cumque sed facere, voluptatem quibusdam commodi sequi. Non.",
            'duration' => "45 minutes",
            // 'schedule_id' => $this->faker->randomDigitNotNull(),
            'status' => 'Active',
        ];
    }
}
