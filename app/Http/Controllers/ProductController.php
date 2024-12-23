<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật!');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa!');
    }
}