@extends('layouts.app')

@section('title', 'Tạo Đơn hàng mới')

@section('content')
<h1>Tạo Đơn hàng mới</h1>

<form action="{{ url('/orders') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="customer_id" class="form-label">Khách Hàng</label>
        <select name="customer_id" id="customer_id" class="form-control">
            @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="order_date" class="form-label">Ngày Đặt Hàng</label>
        <input type="date" class="form-control" id="order_date" name="order_date" required>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Trạng Thái</label>
        <select name="status" id="status" class="form-control">
            <option value="pending">Đang xử lý</option>
            <option value="completed">Hoàn thành</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection
