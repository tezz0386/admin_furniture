@extends('layouts.front-app')
@section('content')
<div class="text-center">
	<form action="https://uat.esewa.com.np/epay/main" method="POST" id="form-pay">
		@csrf
		<input value="{{$totalPrice}}" name="tAmt" type="hidden">
		<input value="{{$totalPrice}}" name="amt" type="hidden">
		<input value="0" name="txAmt" type="hidden">
		<input value="0" name="psc" type="hidden">
		<input value="0" name="pdc" type="hidden">
		<input value="EPAYTEST" name="scd" type="hidden">
		<input value="{{$p_id}}" name="pid" type="hidden">
		<input value="{{route('success')}}?q=su" type="hidden" name="su">
		<input value="{{route('error')}}?q=fu" type="hidden" name="fu">
		<button id="Clearance-btn" class=" btn-pay" type="submit">Pay With Esewa</button>
	</form>
</div>
@endsection