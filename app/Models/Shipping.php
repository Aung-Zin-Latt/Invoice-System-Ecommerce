<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = "shippings";

    public function order()
    {
        return $this->belongsTo(Order::class)->withDefault();
    }
    public function country()
    {
        return $this->belongsTo(Country::class);

    }
    public function city()
    {
        return $this->belongsTo(City::class);

    }
    public function township()
    {
        return $this->belongsTo(Township::class);

    }
}
