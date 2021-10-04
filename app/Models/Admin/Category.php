<?php

namespace App\Models\Admin;

use App\Models\Admin\Product;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    protected $fillable=[
        'title',
        'slug',
        'description',
        'title_tag',
        'meta_keywords',
        'meta_description',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }



    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
