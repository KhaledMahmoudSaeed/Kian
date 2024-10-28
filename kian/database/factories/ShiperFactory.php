<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shiper>
 */
class ShiperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    private static $shipperNames = [
        'Express Logistics',
        'Global Shippers',
        'Prime Couriers',
        'Swift Delivery',
        'Freight Masters',
        'Parcel Movers',
        'Rapid Transit',
        'Metro Shipping',
        'Fast Track Cargo',
        'Oceanic Transport'
    ];
    public function definition(): array
    {
        $shipperName = array_pop(self::$shipperNames);

        return [
            'name' => $shipperName,
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
