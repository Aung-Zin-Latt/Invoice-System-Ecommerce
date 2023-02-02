<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profiles";
    protected $fillable = [
        'user_id',
        'image',
        'mobile',
        'line1',
        'line2',
        'city',
        'province',
        'country',
        'zipcode',
        'url',
        'company_name',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
