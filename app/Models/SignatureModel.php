<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SignatureModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "signature_models";
    protected $fillable = ['user_id','user_sign'];
}
