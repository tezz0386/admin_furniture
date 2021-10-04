@extends('layouts.app', ['activePage' => 'products', 'title' => 'product List', 'navName' => 'product List', 'activeButton' => 'product'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">product List</h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Belongs To</th>
                                <th>Created At</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                @if(isset($products) && count($products)>0)
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$n++}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>
                                        <a href="{{route('product.edit', $product)}}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('product.destroy', $product)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {!! $products->onEachSide(5)->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection