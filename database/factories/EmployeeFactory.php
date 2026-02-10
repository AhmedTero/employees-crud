<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=>fake()->name(),
            "email"=>fake()->unique()->safeEmail(),
            "address"=>fake()->address(),
            "phone"=>fake()->phoneNumber(),
            "position"=>fake()->jobTitle(),
            "status"=>fake()->randomElement(["active", "inactive"]),
            "salary"=>fake()->numberBetween(5000,60000),
        ];
    }
}
