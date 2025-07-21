<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Claim>
 */
class ClaimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'power' => $this->faker->randomFloat(3, 0.1, 100.0),
            'user_id' => 1,
            'last_edit_user' => null,
            'status' => 1,
            'connect_id' => null,
            'type' => 1, // можно переопределить в тесте
            'reg_num' => null,
            'reg_date' => null,
        ];
    }
}
