<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmrodProductsWithBranding extends Model
{
    use HasFactory;

    protected $table = 'amrod_products_with_branding';

    protected $fillable = [
        'customer_id',
        'integration_type_id',
        'data'
    ];
}
