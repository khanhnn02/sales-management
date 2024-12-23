@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lịch sử mua hàng của {{ $customer->name }}</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>
                    <ul>
                        @foreach ($order->orderDetails as $detail)
                        <li>{{ $detail->product->name }} - Số lượng: {{ $detail->quantity }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
