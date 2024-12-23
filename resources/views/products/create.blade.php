@extends('layouts.app')

@section('title', 'Thêm Sản phẩm mới')

@section('content')
<h1>Thêm Sản phẩm mới</h1>

<form action="{{ url('/products') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Tên Sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Mô Tả</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Giá</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Số Lượng</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection
