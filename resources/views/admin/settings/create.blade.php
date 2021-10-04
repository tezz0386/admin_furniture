@extends('layouts.app', ['activePage' => 'sitesetting', 'title' => 'Site Setting', 'navName' => 'Site Setting', 'activeButton' => 'laravel'])
@section('content')
<div class="container">
    <form class="form" action="{{route('sitesetting.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-hader">
                <center><strong>Site Setting</strong></center>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Web Site Name:</label>
                            <input type="text" name="name" class="form-control form-control-sm" placeholder="Enter Your Site Name" value="{{old('name')}}">
                            @error('name')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Description:</label>
                            <textarea class="form-control form-control-sm" name="description" placeholder="Describe about your site">{{old('description')}}</textarea>
                            @error('description')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label>
                                    <img id="iconThumbnail" height="25" width="25" 
                                    src="{{asset('image/icon.png')}}"
                                    >
                                    <input type="file" name="icon" hidden="hidden" id="icon">
                                </label>
                                @error('icon')
                                 <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label>
                                    <img id="logoThumbnail" height="250" width="250"  src="{{asset('image/logo.png')}}"
                                    >
                                    <input type="file" name="logo" hidden="hidden" id="logo">
                                </label>
                                @error('logo')
                                 <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Address :</label>
                            <input type="text" name="address" class="form-control form-control-sm" placeholder="Enter Address" value="{{old('address')}}">
                            @error('address')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Contact No :</label>
                            <input type="text" name="contact_no" class="form-control form-control-sm" placeholder="Enter Address" value="{{old('contact_no')}}">
                            @error('contact_no')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Email:</label>
                            <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter Email" value="{{old('email')}}">
                            @error('email')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Location:</label>
                            <input type="url" name="location" class="form-control form-control-sm" placeholder="Enter Location URL" value="{{old('location')}}">
                            @error('location')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Title Tag:</label>
                            <input type="text" name="title_tag" class="form-control form-control-sm" placeholder="Enter Your Site Title Tag" value="{{old('title_tag')}}">
                            @error('title_tag')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Meta Keywords:</label>
                            <textarea class="form-control form-control-sm" name="meta_keywords" style="height: 100px;">{{old('meta_keywords')}}</textarea>
                            @error('meta_keywords')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Meta Description:</label>
                            <textarea class="form-control form-control-sm" name="meta_description" style="height: 150px;">{{old('meta_description')}}</textarea>
                            @error('meta_description')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right bg-primary" style="color: #fff;">Submit</button>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $('#icon').on('change', function() {
        var file = $(this).get(0).files;
        var reader = new FileReader();
        reader.readAsDataURL(file[0]);
        reader.addEventListener("load", function(e) {
        var image = e.target.result;
        $("#iconThumbnail").attr('src', image);
        });
        });
        $('#logo').on('change', function() {
        var file = $(this).get(0).files;
        var reader = new FileReader();
        reader.readAsDataURL(file[0]);
        reader.addEventListener("load", function(e) {
        var image = e.target.result;
        $("#logoThumbnail").attr('src', image);
        });
    });
</script>
@endpush