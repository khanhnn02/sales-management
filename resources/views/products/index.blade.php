@extends('layouts.app')

@section('title', 'Danh sách Sản phẩm')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Danh sách Sản phẩm</h1>
    <a href="{{ url('/products/create') }}" class="btn btn-primary">Thêm mới</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên Sản Phẩm</th>
            <th>Mô Tả</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ url('/products/' . $product->id . '/edit') }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ url('/products/' . $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
