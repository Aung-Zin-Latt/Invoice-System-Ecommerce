<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'url', 'product_id'];

    public function productId()
    {
        return $this->belongsTo(Product::class);
    }
}
