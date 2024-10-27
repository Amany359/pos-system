<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // Define the table associated with the model (optional if the table name follows Laravel conventions)
    protected $table = 'products';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'name',
        'description',
        'current_stock',
    ];

    // If you want to add any relationships, you can define them here
    // Example:
     public function transactions()
     {
         return $this->hasMany(Transaction::class);
     }
}
