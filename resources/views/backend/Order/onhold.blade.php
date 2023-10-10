@extends('backend.master')
@section('content')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            ONHOLD LIST
        </h3>

    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Order Id</th>
                <th>Product Id</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->product_id}}</td>
                <td>{{$order->order_id}}</td>
                <td>{{$order->payment_method}}</td>
                <td>
                    <a class="badge text-bg-success" href="{{route('processing.status',$order->id)}}">Processing</a>
                </td>
                <td>{{$order->created_at}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection