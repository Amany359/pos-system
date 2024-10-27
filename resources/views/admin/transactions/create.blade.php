@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h1>Create Transaction</h1>

    <form action="{{ route('admin.transactions.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-select" required>
                <option value="">Select a Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Transaction Type</label>
            <select name="type" id="type" class="form-select" required>
                <option value="open_stock">Open Stock</option>
                <option value="purchase">Purchase</option>
                <option value="sell">Sell</option>
                <option value="sell_return">Sell Return</option>
                <option value="purchase_return">Purchase Return</option>
                <option value="adjustment">Adjustment</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Transaction</button>
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
