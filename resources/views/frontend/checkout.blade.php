@extends('layouts.front-app')
@section('content')
<!-- preloader end -->
<!-- main wrapper start -->
<div class="cv-main-wrapper">
    <div class="cv-cart spacer-top spacer-bottom">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('continueCheckout')}}" method="post">
                        <div class="row">
                            @csrf
                            <div class="col-md-4 col-lg-4">
                                
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="card">
                                    <div class="card card-header">Information</div>
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label>Full Shipping Address:</label>
                                            <input type="text" name="address" class="form-control form-control-sm" id="delivery_address">
                                        </div>
                                        <div class="form-group">
                                            <label>Reciever Name:</label>
                                            <input type="text" name="name" class="form-control form-control-sm" id="full_name">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <input type="text" name="contact_no" class="form-control form-control-sm" id="contact_no">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mt-2">Continue</button>
                            </div>
                            <div class="col-md-4 col-lg-4"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection