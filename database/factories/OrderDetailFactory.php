<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => \App\Models\Order::factory(), // Liên kết đơn hàng
            'product_id' => \App\Models\Product::factory(), // Liên kết sản phẩm
            'quantity' => $this->faker->numberBetween(1, 10), // Số lượng mỗi sản phẩm
        ];
    }
}
