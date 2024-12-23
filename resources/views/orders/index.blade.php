@extends('layouts.app')

@section('title', 'Danh sách Đơn hàng')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Danh sách Đơn hàng</h1>
    <a href="{{ url('/orders/create') }}" class="btn btn-primary">Thêm mới</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Khách Hàng</th>
            <th>Ngày Đặt</th>
            <th>Trạng Thái</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer->name }}</td>
            <td>{{ $order->order_date }}</td>
            <td>{{ $order->status == 'completed' ? 'Hoàn thành' : 'Đang xử lý' }}</td>
            <td>
                <a href="{{ url('/orders/' . $order->id . '/edit') }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ url('/orders/' . $order->id) }}" method="POST" style="display: inline;">
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
