<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'user_id',
        'name',
        'contact_no',
        'cart',
        'delivery_address',
        'is_confirmed',
        'is_deliverd',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
