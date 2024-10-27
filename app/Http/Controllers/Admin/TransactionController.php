<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Models\Product; // Import Product model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Display a listing of the transactions
    public function index()
    {
        $transactions = Transaction::with('product')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    // Show the form for creating a new transaction
    public function create()
    {
        $products = Product::all(); // Fetch all products
        return view('admin.transactions.create', compact('products')); // Pass products to the view
    }

    // Store a newly created transaction in storage
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'amount' => 'required|numeric',
            'quantity' => 'required|integer',
            'type' => 'required|in:open_stock,purchase,sell,sell_return,purchase_return,adjustment',
        ]);

        Transaction::create($request->all());
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction created successfully.');
    }

    // Display the specified transaction
    public function show(Transaction $transaction)
    {
        return view('admin.transactions.show', compact('transaction'));
    }

    // Show the form for editing the specified transaction
    public function edit(Transaction $transaction)
    {
        $products = Product::all(); // Fetch all products
        return view('admin.transactions.edit', compact('transaction', 'products')); // Pass products to the view
    }

    // Update the specified transaction in storage
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'amount' => 'required|numeric',
            'quantity' => 'required|integer',
            'type' => 'required|in:open_stock,purchase,sell,sell_return,purchase_return,adjustment',
        ]);

        $transaction->update($request->all());
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction updated successfully.');
    }

    // Remove the specified transaction from storage
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
