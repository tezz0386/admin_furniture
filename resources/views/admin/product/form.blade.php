@extends('layouts.app', ['activePage' => 'add-product', 'title' => 'product Add', 'navName' => 'product', 'activeButton' => 'product'])
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{asset('ckeditor/sample/styles.css')}}">
<style type="text/css">
input{
height: 25px !important;
}
select{
height: 35px !important;
}
.is_ {
overflow: hidden;
}
</style>
<div class="container">
    <form class="form"
        @if(isset($product)) action="{{route('product.update', $product)}}" @else action="{{route('product.store')}}"  @endif
        method="post" enctype="multipart/form-data">
        @if(isset($product))
        {{method_field('PATCH')}}
        @endif
        @csrf
        <div class="card">
            <div class="card-hader">
                <center><strong>product @if(isset($product)) Update @else Addon @endif Form </strong></center>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Choose Category:</label>
                            <select name="category" class="form-control form-control-sm">
                                @if(isset($product))
                                <option value="{{$product->category_id}}">
                                    {{$product->category->title}}
                                </option>
                                @else
                                <option value="">Please Choose a category</option>
                                @endif
                                @if(isset($categories) && count($categories)>0)
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('category')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" name="title" class="form-control form-control-sm" placeholder="Enter Your Site Name" value="{{old('title', @$product->title)}}">
                            @error('title')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="qty">Qty</label>
                                    <input type="number" name="qty" class="form-control form-control-sm" value="{{old('qty', @$product->qty)}}">
                                    @error('qty')
                                    <span class="alert alert-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control form-control-sm" value="{{old('price', @$product->price)}}">
                                    @error('price')
                                    <span class="alert alert-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="number" name="discount" class="form-control form-control-sm" value="{{old('discount', @$product->discount)}}">
                                    @error('discount')
                                    <span class="alert alert-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <label>
                                    <input type="checkbox" name="is_new" value="1" @if(@$product->is_new == true) checked @endif> <label class="is_">Is New Arrival ?</label>
                                </label>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label>
                                    <input type="checkbox" name="is_offer" value="1" @if(@$product->is_offer == true) checked @endif> <label class="is_">Is New Offer ?</label>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Color:</label>
                            <input type="text" name="color" class="form-control form-control-sm" value="{{old('color', @$product->color)}}">
                            @error('color')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Size:</label>
                            <input type="text" name="size" class="form-control form-control-sm" value="{{old('size', @$product->size)}}">
                            @error('size')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Picture:</label>
                            <input type="file" name="thumbnail" class="form-control form-control-sm" style="height: 40px !important;">
                            @error('thumbnail')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div id="coba"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Summary:</label>
                            <textarea class="form-control form-control-sm" name="summary" placeholder="Describe about your product in summary" style="height: 150px;">{{old('summary', @$product->summary)}}</textarea>
                            @error('summary')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Title Tag:</label>
                            <input type="text" name="title_tag" class="form-control form-control-sm" placeholder="Enter Your Site Title Tag" value="{{old('title_tag', @$product->title_tag)}}">
                            @error('title_tag')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Meta Keywords:</label>
                            <textarea class="form-control form-control-sm" name="meta_keywords" style="height: 100px;">{{old('meta_keywords', @$product->meta_keywords)}}</textarea>
                            @error('meta_keywords')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Meta Description:</label>
                            <textarea class="form-control form-control-sm" name="meta_description" style="height: 150px;">{{old('meta_description', @$product->meta_description)}}</textarea>
                            @error('meta_description')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="container">
                        <div class="form-group">
                            <label for="name">Description:</label>
                            <textarea class="form-control form-control-sm editor" name="description" placeholder="Describe about your product in detail" style="height: 150px;">{{old('description', @$product->description)}}</textarea>
                            @error('description')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bg-primary" style="color: #fff;">
                    @if(isset($product)) Update @else Submit @endif
                    </button>
                </div>
                
            </div>
        </div>
    </form>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{asset('js/spartan-multi-image-picker.js')}}"></script>
<script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>
<script type="text/javascript">
$(function(){
$("#coba").spartanMultiImagePicker({
fieldName:        'fileUpload[]',
maxCount:         5,
rowHeight:        '200px',
groupClassName:   'col-md-4 col-sm-4 col-xs-6',
maxFileSize:      '',
placeholderImage: {
image: "{{asset('placeholder.png')}}",
width : '100%'
},
dropFileLabel : "Drop Here",
onAddRow:       function(index){
console.log(index);
console.log('add new row');
},
onRenderedPreview : function(index){
console.log(index);
console.log('preview rendered');
},
onRemoveRow : function(index){
console.log(index);
},
onExtensionErr : function(index, file){
console.log(index, file,  'extension err');
alert('Please only input png or jpg type file')
},
onSizeErr : function(index, file){
console.log(index, file,  'file size too big');
alert('File size too big');
}
});
});
ClassicEditor
.create( document.querySelector( '.editor' ), {
// ckfinder: {
//           uploadUrl: '{{asset("ckeditor/ckfinder/ckfinder/core/connector/php/connector.php")}}?command=QuickUpload&type=Files&responseType=json',
//              },
toolbar: {
items: [
'heading',
'|',
'textPartLanguage',
'bold',
'italic',
'link',
'bulletedList',
'numberedList',
'|',
'outdent',
'indent',
'|',
'imageUpload',
'blockQuote',
'insertTable',
'mediaEmbed',
'undo',
'redo',
'alignment',
'fontColor',
'fontFamily',
'fontBackgroundColor',
'fontSize',
'highlight',
'CKFinder',
'findAndReplace'
]
},
language: 'en',
image: {
toolbar: [
'imageTextAlternative',
'imageStyle:inline',
'imageStyle:block',
'imageStyle:side',
'linkImage'
]
},
table: {
contentToolbar: [
'tableColumn',
'tableRow',
'mergeTableCells'
]
},
licenseKey: '',
})
.then( editor => {
window.editor = editor;
} )
.catch( error => {
console.error( 'Oops, something went wrong!' );
console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
console.warn( 'Build id: xssmfrzicipw-6don1y1odq75' );
console.error( error );
} );
</script>
@endpush