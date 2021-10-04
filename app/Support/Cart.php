<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;

class Cart
{
   public $items;
   public $totalQty=0;
   public $totalPrice=0;

   public function __construct($oldCart)
   {
           if($oldCart){
           	$this->items=$oldCart->items;
           	$this->totalQty=$oldCart->totalQty;
           	$this->totalPrice=$oldCart->totalPrice;
           }
   }
     public function add($item, $id){
     	$storedItem=['qty'=>0, 'price'=>$item->price, 'item'=>$item];
     	if($this->items){
     		if(array_key_exists($id, $this->items)){
     			$storedItem=$this->items[$id];
     		}
     	}
     	$storedItem['qty']++;
     	$storedItem['price']=$item->price*$storedItem['qty'];
     	$this->items[$id]=$storedItem;
     	$this->totalQty++;
     	$this->totalPrice+=$item->price;
        $data = array(
            'qty'=>$storedItem['qty'],
            'price'=>$storedItem['price'],
            'totalQty'=>$this->totalQty,
            'totalPrice'=>$this->totalPrice,
        );
        return $data;
	 }
	 public function updateCarts($item, $id){
		$storedItem=['qty'=>0, 'price'=>$item->price, 'item'=>$item];
     	if($this->items){
     		if(array_key_exists($id, $this->items)){
     			$storedItem=$this->items[$id];
     		}
     	}
     	$storedItem['qty']--;
     	$storedItem['price']=$item->price*$storedItem['qty'];
     	$this->items[$id]=$storedItem;
     	$this->totalQty--;
     	$this->totalPrice-=$item->price;
        $data = array(
            'qty'=>$storedItem['qty'],
            'price'=>$storedItem['price'],
            'totalQty'=>$this->totalQty,
            'totalPrice'=>$this->totalPrice,
        );
        return $data;
	}

    public function deleteCarts($item, $id){
        $storedItem=['qty'=>0, 'price'=>$item->price, 'item'=>$item];
        if($this->items){
            if(!array_key_exists($id, $this->items)){
                return false;
            }
        }
        // $storedItem['qty']--;
        // $storedItem['price']=$item->price*$storedItem['qty'];
        // $this->items[$id]=$storedItem;
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -=  $item->price * $this->items[$id]['qty'];

        // $data = array(
        //     'qty'=>$storedItem['qty'],
        //     'price'=>$storedItem['price'],
        //     'totalQty'=>$this->totalQty,
        //     'totalPrice'=>$this->totalPrice,
        // );
        unset($this->items[$id]);
        return true;
    }

}
