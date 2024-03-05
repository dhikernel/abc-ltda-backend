<?php

namespace Database\Factories\Domain\Product\Models;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Celular 1',
                'Celular 2',
                'Celular 3',
            ]),
            'price' => $this->faker->randomElement([
                '1.800',
                '3.200',
                '9.800',
            ]),
            'description' => $this->faker->text(),
        ];
    }
}
