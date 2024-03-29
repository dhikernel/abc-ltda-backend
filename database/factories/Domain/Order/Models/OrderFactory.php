<?php

namespace Database\Factories\Domain\Order\Models;

use App\Domain\Order\Models\Order;
use App\Domain\Product\Models\Product;
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
            'product_id' => Product::factory()->create()->id,
            'sales_id'   => $this->faker->randomNumber(),
            'amount'     => $this->faker->randomNumber(),
        ];
    }
}
