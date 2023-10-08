@extends('backend.master')
@section('content')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Prudcit List
        </h3>
        <div class="card-tools">
            <a href="{{route('product.create')}}" type="button" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Product </a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->status}}</td>
                <td>{{$product->image}}</td>
                <td>
                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-success">edit</a>
                    <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger">delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection