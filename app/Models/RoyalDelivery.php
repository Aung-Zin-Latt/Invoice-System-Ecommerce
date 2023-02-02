<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoyalDelivery extends Model
{
    use HasFactory;

    protected $table = 'royal_deliveries';

    protected $fillable = ['name', 'basic_cost', 'waiting_time'];
}
