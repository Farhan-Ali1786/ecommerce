<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productAttr extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'mrp',
        'qty',
        'price',
        'weight',
        'lenght',
        'height',
        'size_id',
        'breadth',
        'color_id',
        'product_id',
    ];
}
