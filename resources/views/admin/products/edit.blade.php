@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Edit Product: {{ $product->name }}</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="current_stock">Current Stock</label>
            <input type="number" class="form-control" id="current_stock" name="current_stock" value="{{ $product->current_stock }}" min="0" required>
        </div>
        <button type="submit" class="btn btn-success">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
