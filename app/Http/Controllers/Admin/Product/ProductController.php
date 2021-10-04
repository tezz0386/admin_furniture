<?php

namespace App\Http\Controllers\Admin\Product;



use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Thumbnail;
use App\Support\ImageSupport;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    protected $width = 253;
    protected $height = 253;
    protected $folderName = 'admin.product.';
    protected $product;
    protected $imageSupport;
    function __construct(ImageSupport $imageSupport, Product $product)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->imageSupport = $imageSupport;
    }
    public function getCategories()
    {
        return Category::select('title', 'id')->orderByDesc('created_at')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderByDesc('created_at')->paginate(6);
        return view($this->folderName.'index', [
            'products'=>$products,
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
        return view($this->folderName.'form', [
            'categories'=>$this->getCategories(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category = Category::find($request->category);
        $this->product->fill($request->all());
        $this->product->available = $request->qty;
        $image = $this->imageSupport->saveAnyImg($request, 'products', 'thumbnail', $this->width, $this->height);
        $this->product->thumbnail=$image;
        if($category->products()->save($this->product)){
            if($request->hasFile('fileUpload')){
                foreach($request->file('fileUpload') as $file){
                    $image1 = $this->imageSupport->saveGallery($file, 'products', $this->width, $this->height);
                    DB::table('thumbnails')->insert([
                        'thumbnail'=>$image1,
                        'product_id'=>$this->product->id,
                    ]);

                }
            }
            Toastr::success('Successfully 1 product added', 'Success !!!', $options = []);
            return redirect()->route('product.index');
        }else{
            Toastr::error('Product Could not be added please try again', 'Opps !!!', $optionGroup=[]);
            return back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view($this->folderName.'form', [
            'product'=>$product,
            'categories'=>$this->getCategories(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        //
        $category = Category::find($request->category);
        $this->product = $product;
        $this->product->fill($request->all());
        $this->product->available = $product->qty + $request->qty;
        if(!$request->file('thumbnail')== ''){
            $image = $this->imageSupport->saveAnyImg($request, 'products', 'thumbnail', $this->width, $this->height);
            $this->product->thumbnail=$image;
        }
         if($category->products()->save($this->product)){
            if($request->hasFile('fileUpload') && !$request->file('fileUpload')== ''){
                foreach($this->product->thumbnails as $thumb){
                    $this->imageSupport->deleteImg('products', $thumb->thumbnail);
                    DB::table('thumbnails')->where('thumbnail', '=', $thumb)->delete();
                }
                foreach($request->file('fileUpload') as $file){
                    $image1 = $this->imageSupport->saveGallery($file, 'products', $this->width, $this->height);
                    DB::table('thumbnails')->insert([
                        'thumbnail'=>$image1,
                        'product_id'=>$this->product->id,
                    ]);

                }
            }
            Toastr::success('Successfully 1 product Update', 'Success !!!', $options = []);
            return redirect()->route('product.index');
        }else{
            Toastr::error('Product Could not be update please try again', 'Opps !!!', $optionGroup=[]);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
