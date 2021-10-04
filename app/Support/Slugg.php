<?php 

namespace App\Support;

use App\Models\Admin\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Slugg
{
	protected $slug;
	function __construct()
	{

	}
	public function getSlug($toSlug)
	{
		return $this->slug = SlugService::createSlug(Category::class, 'slug', $toSlug);
	}
}

 ?>