@extends('layouts.app', ['activePage' => 'add-category', 'title' => 'Category Add', 'navName' => 'Category', 'activeButton' => 'category'])
@section('content')
<div class="container">
    <form class="form" 
     @if(isset($category)) action="{{route('category.update', $category)}}" @else action="{{route('category.store')}}"  @endif
           method="post">
           @if(isset($category))
           {{method_field('PATCH')}}
           @endif
        @csrf
        <div class="card">
            <div class="card-hader">
                <center><strong>Category @if(isset($category)) Update @else Addon @endif Form </strong></center>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" name="title" class="form-control form-control-sm" placeholder="Enter Your Site Name" value="{{old('title', @$category->title)}}">
                            @error('title')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Description:</label>
                            <textarea class="form-control form-control-sm" name="description" placeholder="Describe about your site" style="height: 200px;">{{old('description', @$category->description)}}</textarea>
                            @error('description', @$category->description)
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Title Tag:</label>
                            <input type="text" name="title_tag" class="form-control form-control-sm" placeholder="Enter Your Site Title Tag" value="{{old('title_tag', @$category->title_tag)}}">
                            @error('title_tag')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Meta Keywords:</label>
                            <textarea class="form-control form-control-sm" name="meta_keywords" style="height: 100px;">{{old('meta_keywords', @$category->meta_keywords)}}</textarea>
                            @error('meta_keywords')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Meta Description:</label>
                            <textarea class="form-control form-control-sm" name="meta_description" style="height: 150px;">{{old('meta_description', @$category->meta_description)}}</textarea>
                            @error('meta_description')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right bg-primary" style="color: #fff;">
                            @if(isset($category)) Update @else Submit @endif
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
</div>
@endsection
@push('js')

@endpush