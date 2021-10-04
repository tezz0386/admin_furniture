<?php

namespace App\Models\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\Thumbnail;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Sluggable;

    protected $fillable =[
        'category_id',
        'title',
        'slug',
        'description',
        'qty',
        'available',
        'sold',
        'price',
        'discount',
        'is_new',
        'is_offer',
        'size',
        'color',
        'title_tag',
        'meta_keywords',
        'meta_description',
        'summary',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function thumbnails()
    {
        return $this->hasMany(Thumbnail::class, 'product_id');
    }
}
