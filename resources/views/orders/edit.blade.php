@extends('layouts.app')

@section('title', 'Chỉnh sửa Đơn hàng')

@section('content')
<h1>Chỉnh sửa Đơn hàng #{{ $order->id }}</h1>

<form action="{{ url('orders/' . $order->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="customer_id" class="form-label">Khách Hàng</label>
        <select name="customer_id" id="customer_id" class="form-control">
            @foreach($customers as $customer)
            <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="order_date" class="form-label">Ngày Đặt Hàng</label>
        <input type="date" name="order_date" id="order_date" class="form-control" value="{{ $order->order_date }}" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Trạng Thái</label>
        <select name="status" id="status" class="form-control">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang xử lý</option>
            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection
