<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $orders = Order::all();
        $products = Product::all();

        foreach ($orders as $order) {
            $randomProducts = $products->random(rand(2, 5)); // Mỗi đơn hàng có từ 2 đến 5 sản phẩm

            foreach ($randomProducts as $product) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 10),
                ]);
            }
        }
    }
}
