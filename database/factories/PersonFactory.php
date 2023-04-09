<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
	public function definition(): array
	{
        $this->faker->seed(\DB::table('faker')->value('seed'));

		return [
			'name' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            'title' => $this->faker->unique()->jobTitle,
            'role' => $this->faker->randomElement(['Admin', 'Manager', 'Editor', 'Viewer']),
		];
	}
}
