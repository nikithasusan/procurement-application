@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Purchase Order #{{ $order->id }}</h2>
    <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
    <p><strong>Supplier:</strong> {{ $order->supplier->name }}</p>
    <p><strong>Item Total:</strong> {{ $order->item_total }}</p>
    <p><strong>Discount:</strong> {{ $order->discount }}</p>
    <p><strong>Net Amount:</strong> {{ $order->net_amount }}</p>
    
    <hr>

    <button class="btn btn-primary" onclick="window.print()">Print this page</button>
</div>
@endsection
