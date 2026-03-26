<?php

namespace Database\Factories;

use App\Models\PesoJob;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PesoJob>
 */
class PesoJobFactory extends Factory
{
    protected $model = PesoJob::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraphs(3, true),
            'requirements' => $this->faker->paragraphs(2, true),
            'salary' => $this->faker->numberBetween(15000, 80000),
            'type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'temporary']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}