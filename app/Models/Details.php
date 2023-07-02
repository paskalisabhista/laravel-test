<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    public $table = "details";
    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'total',
        'created_at',
        'updated_at',
    ];
}