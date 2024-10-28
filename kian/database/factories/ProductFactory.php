<?php

namespace Database\Factories;

use App\Models\Shiper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $productNames = [
        'Wireless Mouse',
        'Mechanical Keyboard',
        'Gaming Monitor',
        'Bluetooth Speaker',
        'Smartphone',
        'Laptop Stand',
        'External Hard Drive',
        'USB-C Hub',
        'Noise Cancelling Headphones',
        'Portable Charger',
        'Smartwatch',
        'Desk Lamp',
        'Ergonomic Chair',
        'Laptop Bag',
        'Action Camera',
        'Smart Home Hub',
        'Electric Kettle',
        'Air Purifier',
        'LED Light Strip',
        'Graphic Tablet',
        'Coffee Maker',
        'Streaming Webcam',
        'Smart Thermostat',
        'Water Bottle',
        'Fitness Tracker',
        'Standing Desk',
        'Robot Vacuum',
        'Electric Toothbrush',
        'Hair Dryer',
        'Cordless Drill',
        '3D Printer',
        'Portable Projector',
        'Wireless Earbuds',
        'Bluetooth Tracker',
        'Smart Door Lock',
        'Video Doorbell',
        'Instant Pot',
        'Digital Scale',
        'Electric Bike'
    ];
    public function definition(): array
    {
        $productName = count(self::$productNames) > 0 ? array_pop(self::$productNames) : $this->faker->unique()->word;

        return [
            'name' => $productName,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 200, 1200),
            'quantity' => $this->faker->randomNumber(1),
            'sale' => $this->faker->numberBetween(5, 20),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'shiper_id' => Shiper::all()->random()->id ?? Shiper::factory(), // Fetch a random Shipper ID or create one
        ];
    }
}
