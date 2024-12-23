<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => \App\Models\Customer::factory(), // Tạo khách hàng liên kết
            'order_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pending', 'completed']), // Trạng thái đơn hàng
        ];
    }
}
