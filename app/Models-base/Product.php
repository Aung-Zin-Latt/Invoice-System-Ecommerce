<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'buying_price',
        'regular_price',
        'sale_price',
        'SKU',
        'stock_status',
        'feature',
        'image',
        'url',
        'quantity',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
    public function subCategories()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    // public function attributeValues()
    // {
    //     return $this->hasMany(AttributeValue::class, 'product_id');
    // }
    // public function imageGallery()
    // {
    //     return $this->hasMany(Image_Gallery::class, 'product_id');
    // }
    // public function shopkeepers()
    // {
    //     return $this->hasMany(ShopKeeper::class, 'product_id');
    // }
}
