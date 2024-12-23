@extends('layouts.app')

@section('title', 'Danh sách Khách hàng')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Danh sách Khách hàng</h1>
    <a href="{{ url('/customers/create') }}" class="btn btn-primary">Thêm mới</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Họ Tên</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email }}</td>
            <td>
                <a href="{{ url('/customers/' . $customer->id . '/edit') }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ url('/customers/' . $customer->id) }}" method="POST" style="display: inline;">
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
