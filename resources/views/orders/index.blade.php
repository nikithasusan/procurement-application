@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h2>Purchase Orders</h2>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Add Purchase Order</a>
</div>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Order No</th>
            <th>Order Date</th>
            <th>Supplier Name</th>
            <th>Item Total</th>
            <th>Discount</th>
            <th>Net Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->order_date }}</td>
            <td>{{ $order->supplier->name }}</td> <!-- Assuming the supplier relationship is defined -->
            <td>{{ $order->item_total }}</td>
            <td>{{ $order->discount }}</td>
            <td>{{ $order->net_amount }}</td>
            <td>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this purchase order?')">Delete</button>
                    <a href="{{ route('orders.print', $order->id) }}" class="btn btn-sm btn-secondary" target="_blank">Print</a> <!-- Print button -->
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
