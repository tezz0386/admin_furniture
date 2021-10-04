<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'user_id',
        'p_id',
        'qty',
        'category_id',
        'payment_id',
    ];


}
