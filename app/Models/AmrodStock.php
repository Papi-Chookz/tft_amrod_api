<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmrodStock extends Model
{
    use HasFactory;

    protected $table = 'amrod_stock';

    protected $fillable = [
        'customer_id',
        'integration_type_id',
        'data'
    ];
}
