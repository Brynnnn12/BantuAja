<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //pakai faker tapi bahasa indonesia
        $this->faker->locale('id_ID');

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'target_amount' => $this->faker->numberBetween(100000, 10000000),
            'collected_amount' => 0,
            'status' => 'active',
        ];
    }
}
