<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $table = "transaction";
    protected $fillable = [
        'user_id',
        'product_id',
       // 'details_id',
        'transaction_totalprice',
        'created_at',
        'updated_at',
    ];
}
