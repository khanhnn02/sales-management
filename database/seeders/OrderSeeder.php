<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Customer;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $customers = Customer::all();
        
        foreach ($customers as $customer) {
            Order::factory(3)->create(['customer_id' => $customer->id]); // Mỗi khách hàng có 3 đơn hàng giả
        }
    }
}
