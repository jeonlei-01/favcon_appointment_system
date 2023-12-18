<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Favio Jasso',
            'email' => 'leenunuyaa@gmail.com',
            'role' =>  1,
            'password' => '$2y$10$jQrPXQPbpswOcdi/MhisDuTE/CHhzKEjpOS73Gs/FA0S6IL6oPYly', // password
        ];
    }
}
