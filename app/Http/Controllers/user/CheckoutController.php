<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Support\Cart;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;
use Session;

class CheckoutController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCheckout(Request $request)
    {
        //
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view('frontend.checkout', [
            'products'=>$cart->items,
            'totalPrice'=>$cart->totalPrice,
        ]);

    }
    public function success()
    {
        return redirect()->route('postCheckout');
    }
    public function error()
    {
        return "Error";
    }
    public function continueCheckout(Request $request)
    {   
        $p_id = SITE_NAME.rand(0000, 9999);
        $request->session()->put('payment_id', $p_id);
        $request->session()->put('userInfo', $request->all());
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view('frontend.payment', [
            'products'=>$cart->items,
            'totalPrice'=>$cart->totalPrice,
            'p_id'=>$p_id,
        ]);
    }
    public function postCheckout(Request $request)
    {
          $userInfo = $request->session()->get('userInfo');
          $oldCart=$request->session()->get('cart');
          $cart=new Cart($oldCart);
          $id=Auth::user()->id;
          $order_cart = new Order();
          $order_cart->name=$userInfo['name'];
          $order_cart->delivery_address=$userInfo['address'];
          $order_cart->contact_no=$userInfo['contact_no'];
          $order_cart->user_id=$id;
          $order_cart->cart=serialize($cart);
          $order_id=Order::select('id')->max('id');
          foreach($cart->items as $item){
            DB::table('calculations')->insert([
                'order_id' => $order_id+1,
                'user_id'=>Auth::user()->id,
                'p_id'=>$item['item']['id'],
                'qty'=>$item['qty'],
                'category_id'=>$item['item']['category_id'],
                'payment_id'=>$request->session()->get('payment_id'),
                ]
            );
           }
          if($order_cart->save()){
              $request->session()->forget('cart');
              $request->session()->forget('payment_id');
              $request->session()->forget('userInfo');
              Toastr::success('Successfully Your Purchase Order Has submited', 'Success !!!', $options = []);
              return redirect()->route('index');
          }else{
            return "Error";
          }
    }
}
