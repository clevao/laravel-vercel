<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WhatsappAccount>
 */
class WhatsappAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phone_number_id' => fake()->numerify('##########'),
            'phone_number' => fake()->numerify('##########'),
            'client_id' => Str::random(10),
        ];
    }
}
