<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaultyItem extends Model
{
    use HasFactory;

    protected $table = "faulty_items";

    protected $filable = [
        'name',
        'quantity',
        'image',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
