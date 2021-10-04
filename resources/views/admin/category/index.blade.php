@extends('layouts.app', ['activePage' => 'categories', 'title' => 'Category List', 'navName' => 'Category List', 'activeButton' => 'category'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Category List</h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created At</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                @if(isset($categories) && count($categories)>0)
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$n++}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $category)}}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('category.destroy', $category)}}" method="post">
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
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection