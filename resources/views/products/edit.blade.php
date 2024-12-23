@extends('layouts.app')

@section('content')
<h2>Sửa Sản phẩm</h2>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
    </div>
    <div class="form-group">
        <label for="quantity">Số lượng</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection
