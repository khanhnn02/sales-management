@extends('layouts.app')

@section('title', 'Chi tiết Đơn hàng')

@section('content')
<h1>Chi tiết Đơn hàng #{{ $order->id }}</h1>

<div class="mb-4">
    <h3>Khách Hàng: {{ $order->customer->name }}</h3>
    <p>Ngày Đặt: {{ $order->order_date }}</p>
    <p>Trạng Thái: {{ $order->status == 'completed' ? 'Hoàn thành' : 'Đang xử lý' }}</p>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Sản Phẩm</th>
            <th>Số Lượng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->orderDetails as $detail)
        <tr>
            <td>{{ $detail->id }}</td>
            <td>{{ $detail->product->name }}</td>
            <td>{{ $detail->quantity }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
