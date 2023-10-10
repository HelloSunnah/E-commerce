@extends('backend.master')
@section('content')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            COMPLETED ORDER LIST
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
                <th>Ongoing Date</th>
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
                <a class="badge text-bg-primary" href="">Deliverd</a>

                </td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection