@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h1>Edit Transaction</h1>

    <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-select" required>
                <option value="">Select a Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $transaction->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $transaction->amount }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $transaction->quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Transaction Type</label>
            <select name="type" id="type" class="form-select" required>
                <option value="open_stock" {{ $transaction->type == 'open_stock' ? 'selected' : '' }}>Open Stock</option>
                <option value="purchase" {{ $transaction->type == 'purchase' ? 'selected' : '' }}>Purchase</option>
                <option value="sell" {{ $transaction->type == 'sell' ? 'selected' : '' }}>Sell</option>
                <option value="sell_return" {{ $transaction->type == 'sell_return' ? 'selected' : '' }}>Sell Return</option>
                <option value="purchase_return" {{ $transaction->type == 'purchase_return' ? 'selected' : '' }}>Purchase Return</option>
                <option value="adjustment" {{ $transaction->type == 'adjustment' ? 'selected' : '' }}>Adjustment</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Transaction</button>
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
