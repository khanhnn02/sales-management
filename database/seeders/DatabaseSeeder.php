<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
       // Tạo 50 sản phẩm
       \App\Models\Product::factory(50)->create();

       // Tạo 30 khách hàng, mỗi khách hàng có 3 đơn hàng
       \App\Models\Customer::factory(30)
           ->hasOrders(3) // 3 đơn hàng mỗi khách hàng
           ->create();

       // Tạo chi tiết đơn hàng
       \App\Models\OrderDetail::factory(100)->create(); // 100 dòng chi tiết đơn hàng
    }
    
}
