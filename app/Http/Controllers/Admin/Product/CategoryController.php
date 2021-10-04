<?php

namespace App\Http\Controllers\Admin\Product;


use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Admin\Category;
use App\Support\Slugg;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;


class CategoryController extends Controller
{
    protected $category;
    protected $slug;
    protected $folderName = 'admin.category.';
    function __construct(Category $category, Slugg $slug)
    {
        $this->middleware('auth');
        $this->slug = $slug;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderByDesc('created_at')->paginate(10);
        return view($this->folderName.'index', [
            'categories'=>$categories,
            'n'=>1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->folderName.'form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $this->category->fill($request->all());
        $this->category->slug=$this->slug->getSlug($request->title);
        if($this->category->save()){
            Toastr::success('Successfully 1 category crated', 'Success !!!', $optionGroup=[]);
            return redirect()->route('category.index');
        }else{
            Toastr::error('Category Could not be addes', 'Opps !!!', $optionGroup=[]);
            return back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view($this->folderName.'form', [
            'category'=>$category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        //
        $this->category = $category;
        $this->category->fill($request->all());
        $this->category->slug=$this->slug->getSlug($request->title);
        if($this->category->save()){
            Toastr::success('Successfully 1 category updated', 'Update !!!', $optionGroup=[]);
             return redirect()->route('category.index');
        }else{
            Toastr::error('Category Could not be Updated', 'Opps !!!', $optionGroup=[]);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->products()->delete();
        if($category->delete()){
            Toastr::success('Successfully 1 category Deleted', 'Delete !!!', $optionGroup=[]);
            return redirect()->route('category.index');
        }else{
            Toastr::error('Category Could not be Deleted', 'Opps !!!', $optionGroup=[]);
            return back()->withInput();
        }
    }
}
