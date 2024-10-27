@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h1>Transactions</h1>
    <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary mb-3">Create New Transaction</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->product->name }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>
                        <a href="{{ route('admin.transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this transaction?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
