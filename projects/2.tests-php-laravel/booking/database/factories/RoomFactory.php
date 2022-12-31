<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => strval($this->faker->numberBetween(100, 999)),
            'capacity' => $this->faker->numberBetween(2, 10),
            'type' => $this->faker->randomElement(['suite', 'manoir', 'chambre', 'style', 'ancient']),
            'hotel_id' => Hotel::factory()->create()->id
        ];
    }
}
