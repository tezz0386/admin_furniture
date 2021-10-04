<?php

namespace App\Http\Controllers;

use App\Models\Admin\Product;
use App\Support\Cart;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use Session;

class FrontEndController extends Controller
{
    //
    protected $product;
    function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function getProducts($no)
    {
        return Product::orderByDesc('created_at')->paginate($no);
    }
    public function getNewArrivals()
    {
        return Product::where('is_new', true)->orderByDesc('created_at')->limit(10)->get();
    }
    public function getPage($slug)
    {
        
    }
    public function index()
    {
        return view('welcome', [
            'products'=>$this->getProducts(20),
            'newArrivals'=>$this->getNewArrivals(),

        ]);
    }
    public function addToCart(Request $request){
        $id= $request->get('id');
        $product =Product::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart'): null;
        $cart=new Cart($oldCart);
        $newData = $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

        $qty='';
        if(Session::has('cart')){
            $qty= Session::get('cart')->totalQty;
        }
        $data = array(
                'qty'    => $qty,
                'q'=> $newData['qty'],
                'price'=> $newData['price'],
                'totalQty'=>$newData['totalQty'],
                'totalPrice'=>$newData['totalPrice'],
        );
        echo json_encode($data);
    }

    public function minusUpdateCart(Request $request){
        $id= $request->get('id');
        $product =Product::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart'): null;
        $cart=new Cart($oldCart);
        $newData = $cart->updateCarts($product, $product->id);
        $request->session()->put('cart', $cart);
        $q = 
        $qty='';
        if(Session::has('cart')){
            $qty= Session::get('cart')->totalQty;
        }
        $data = array(
                'qty'    => $qty,
                'q'=> $newData['qty'],
                'price'=> $newData['price'],
                'totalQty'=>$newData['totalQty'],
                'totalPrice'=>$newData['totalPrice'],
        );
        echo json_encode($data);
      
    }



    public function deleteCarts(Request $request, $slug){
        $product = Product::where('slug', $slug)->firstOrFail();
        $oldCart=Session::has('cart') ? Session::get('cart'): null;
        $cart=new Cart($oldCart);
        $newData = $cart->deleteCarts($product, $product->id);
        $request->session()->put('cart', $cart);
        if($newData){
            Toastr::success('Successfully Product has Removed from your cart', 'Success !!!', $options = []);
            return back()->with('success', 'Successfully Product has Removed from your cart');
        }else{
            return back()->with('error', 'Could not be removed product from cart please try later');
        }
    }




    public function getCart()
    {
        // Session::flush();
        if(!Session::has('cart')){
             Toastr::error('You have not added any product to cart', 'Sorry !!!', $options = []);
            return redirect()->route('index')->with('error','nothing in cart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view('frontend.cart', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice,]);
    }
    // others task hav to be done for cart
    public function getContact()
    {
        return view('frontend.contact');
    }
    public function getSingleProduct($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $this->product->category_id)->limit(20)->get();
        return view('frontend.product', [
            'product'=>$this->product,
            'products'=>$products,
        ]);
    }

}
