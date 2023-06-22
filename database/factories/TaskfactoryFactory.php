<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskfactoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => User::all()-> random()->id,
            'name' => $this->faker->unique()->name(),
            'Description' => $this->faker->sentense(),
            'priority' => $this->faker->randomElement('low','high','medium')
        ];
    }
}
