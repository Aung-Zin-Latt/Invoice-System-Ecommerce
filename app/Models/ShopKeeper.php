<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopKeeper extends Model
{
    protected $table = "shop_keepers";
    protected $fillable = ['quantity', 'product_id'];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
