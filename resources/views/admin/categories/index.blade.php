@extends('layouts.backend-master')
@section('bread')
    <h1>All Categories</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Categories</li>
    </ol>
@endsection
@section('content')
    <section>
        <div class="row">

            <div class="col-xs-12">
                <a href="{{route('category.create')}}" class="btn  btn-primary d-block" style="margin-bottom: 5px"><span class="fa fa-plus"></span> Add New Category </a>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Categories <span class="badge badge-success">{{$categories->count()}}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Products Under This Category</th>
                                <th>Category Created At</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->products->count()}}</td>
                                    <td>{{$category->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="RemoveItem('item-{{$category->id}}')"> <i class="fa fa-trash"></i>   Remove </button>
                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>  Edit </a>
                                    </td>
                                    <form action="{{route('category.destroy',$category->id)}}" id="item-{{$category->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </tr>
                            @endforeach
                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
