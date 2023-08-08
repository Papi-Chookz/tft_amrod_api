<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BearerToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'integration_type_id',
        'token',
        'expiry'
    ];
}