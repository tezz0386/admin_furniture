<?php

namespace App\Models\Admin;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thumbnail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'product_id',
        'thumbnail',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
