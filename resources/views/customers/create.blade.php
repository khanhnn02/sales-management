@extends('layouts.app')

@section('title', 'Thêm Khách hàng mới')

@section('content')
<h1>Thêm Khách hàng mới</h1>

<form action="{{ url('/customers') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Họ Tên</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Địa Chỉ</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Số Điện Thoại</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection
