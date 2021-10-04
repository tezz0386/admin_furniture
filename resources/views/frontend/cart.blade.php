@extends('layouts.front-app')
@section('content')
<!-- preloader end -->
<!-- main wrapper start -->
<div class="cv-main-wrapper">
    @include('pages.breadcrumb')
    <div class="cv-cart spacer-top spacer-bottom">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" id="editableTable">
                        <thead>
                            <tr>
                                <th>Product image</th>
                                <th>Product name</th>
                                <th>unit price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session::has('cart'))
                            @foreach($products as $product)
                            <tr data-id="1">
                                <td>
                                    <div class="cv-cart-img">
                                        <img src="{{asset('uploads/products/thumbnail/'.$product['item']['thumbnail'])}}" alt="image" class="img-fluid">
                                    </div>
                                </td>
                                <td>
                                    {{$product['item']['title']}}
                                </td>
                                <td>Rs {{$product['item']['price']}}</td>
                                <td>
                                    <div class="cv-cart-quantity">
                                        <button class="cv-sub" id="minusUpdate{{$product['item']['id']}}" data-id="{{$product['item']['id']}}" data-qty="{{$product['qty']}}"></button>
                                        <input type="number" value="{{$product['qty']}}" id="qty{{$product['item']['id']}}" readonly="readonly" min="1">
                                        <button class="cv-add" id="plusUpdate{{$product['item']['id']}}" data-id="{{$product['item']['id']}}" data-qty="{{$product['qty']}}"></button>
                                    </div>
                                </td>
                                <td id="price{{$product['item']['id']}}">RS {{$product['price']}}</td>
                                <td>
                                    <a class="button button-small edit" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    
                                    <form action="{{route('deleteCarts', $product['item']['slug'])}}" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="button button-small edit btn-link" title="Delete">
                                        <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            <tr>
                                <td colspan="3" class="cv-d-none"></td>
                                <td><b>Total</b></td>
                                <td colspan="2" class="cv-price">RS <span id="total">{{$totalPrice}}</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cv-cart-btn">
                        <a href="{{route('getCheckout')}}" id="Clearance-btn" class="cv-btn">Clearance</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
$(document).ready(function(){
@if(isset($products) && count($products)>0)
@foreach($products as $product)
var data1 = $('#qty{{$product['item']['id']}}').val();
if(data1<=1 || {{$product['qty']}}<=1){
$('#minusUpdate{{$product['item']['id']}}').attr('disabled', true);
}
$('#minusUpdate{{$product['item']['id']}}').on('click', function(e){
var data = $('#qty{{$product['item']['id']}}').val();
if(data<=1 || {{$product['qty']}}<=1){
$(this).attr('disabled', true);
}
var qty=$(this).data('qty');
var id=$(this).data('id');
$.ajax({
url:"{{route('minusUpdateCart')}}",
type:"post",
data:{
"id":id,
"qty":qty,
"_token":"{{ csrf_token() }}",
},
dataType:'json',
success:function(data)
{
$('#cart_no').html(data.qty);
$('#price{{$product['item']['id']}}').text(data.price);
$('#subTotal').text(data.totalPrice);
$('#total').text(data.totalPrice);
// $('#qtyprice{{$product['item']['id']}}').text(data.q);
console.log(data);
},
error: function(e) {
console.log(e.responseText);
}
})
});
$('#plusUpdate{{$product['item']['id']}}').on('click',function(e){
var data = $('#qty{{$product['item']['id']}}').val();
if(data>=0 || {{$product['qty']}}>=0){
$('#minusUpdate{{$product['item']['id']}}').removeAttr('disabled');
}
var qty=$(this).data('qty');
var id=$(this).data('id');
$.ajax({
url:"{{route('addToCart')}}",
type:"get",
data:{
"id":id,
"qty":qty,
"_token":"{{ csrf_token() }}",
},
dataType:'json',
success:function(data)
{
$('#cart_no').html(data.qty);
$('#price{{$product['item']['id']}}').text(data.price);
$('#subTotal').text(data.totalPrice);
$('#total').text(data.totalPrice);
// $('#qtyprice{{$product['item']['id']}}').text(data.q);
console.log(data);
},
error: function(e) {
console.log(e.responseText);
}
})
});
@endforeach
@endif
});
</script>
@endpush