<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'order_number' => date('Ymd') . 1,
            'title' => $this->faker->title,
            'country' => 'lt',
            'proxy_count' => $this->faker->numberBetween(1,100),
        ];
    }
}
