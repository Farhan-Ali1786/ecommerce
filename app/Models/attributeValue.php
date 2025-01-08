<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attributeValue extends Model
{
    use HasFactory;
    protected $fillable = [
        'attributes_id',
        'value',
    ];


    public function singleAttribute()
    {
         return $this->hasOne(attribute::class,'id','attributes_id');
    }
}
