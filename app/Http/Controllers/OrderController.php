<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Hiển thị danh sách đơn hàng
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    // Hiển thị form thêm mới đơn hàng
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }

    // Lưu đơn hàng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,completed',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        foreach ($request->products as $product) {
            $order->orderDetails()->create([
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Tạo đơn hàng thành công!');
    }

    // Hiển thị chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with(['customer', 'orderDetails.product'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }
    public function edit($id)
    {
        $order = Order::with('orderDetails.product')->findOrFail($id);
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    // Cập nhật trạng thái đơn hàng
     public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,completed',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Cập nhật đơn hàng thành công!');
    }

    // Xóa đơn hàng
    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->route('orders.index')->with('success', 'Xóa đơn hàng thành công!');
    }
}
