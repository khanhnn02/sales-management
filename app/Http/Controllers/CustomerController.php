<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Hiển thị danh sách khách hàng
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Hiển thị form thêm mới khách hàng
    public function create()
    {
        return view('customers.create');
    }

    // Lưu khách hàng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:customers,email',
        ]);

        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Thêm khách hàng thành công!');
    }

    // Hiển thị form chỉnh sửa khách hàng
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // Cập nhật thông tin khách hàng
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:customers,email,' . $id,
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Cập nhật thông tin khách hàng thành công!');
    }

    // Xóa khách hàng
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->route('customers.index')->with('success', 'Xóa khách hàng thành công!');
    }
}
