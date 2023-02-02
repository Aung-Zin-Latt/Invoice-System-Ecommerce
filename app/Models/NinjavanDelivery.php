<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NinjavanDelivery extends Model
{
    use HasFactory;

    protected $table = 'ninjavan_deliveries';

    protected $fillable = ['name', 'basic_cost', 'waiting_time'];
}
