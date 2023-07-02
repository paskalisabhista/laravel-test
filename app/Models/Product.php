<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "product";
    protected $fillable = [
        'product_name',
        'product_price',
        'created_at',
        'updated_at',
    ];
}
