@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Create New Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="current_stock">Current Stock</label>
            <input type="number" class="form-control" id="current_stock" name="current_stock" min="0" required>
        </div>
        <button type="submit" class="btn btn-success">Create Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
