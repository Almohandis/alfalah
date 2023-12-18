<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Part>
 */
class PartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'juz' => 1,
            'rank' => 1,
            'start_name' => '.',
            'start' => 1,
            'end_name' => '.',
            'end'   => 1,
        ];
    }
}
