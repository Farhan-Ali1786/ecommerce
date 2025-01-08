<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryAttribute extends Model
{
    use HasFactory;

     protected $fillable = [
        'attribute_id',
        'category_id',
    ];

    public function attribute()
    {
        return $this->hasOne(attribute::class, 'id', 'attribute_id');
    }


    public function values()
    {
        return $this->hasMany(attributeValue::class,'attributes_id','attribute_id');
    }
    public function category()
    {
        return $this->hasOne(category::class,'id','category_id');
    }
}
