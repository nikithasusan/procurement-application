@extends('layouts.app')

@section('content')
<h2>Edit Purchase Order</h2>

<form action="{{ route('orders.update', $orders->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="order_date" class="form-label">Order Date</label>
        <input type="date" class="form-control" id="order_date" name="order_date" value="{{ old('order_date', $orders->order_date) }}" required>
    </div>

    <div class="mb-3">
        <label for="supplier_id" class="form-label">Supplier</label>
        <select class="form-select" id="supplier_id" name="supplier_id" required>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $supplier->id == $orders->supplier_id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="item_total" class="form-label">Item Total</label>
        <input type="number" class="form-control" id="item_total" name="item_total" value="{{ old('item_total', $orders->item_total) }}" required readonly>
    </div>

    <div class="mb-3">
        <label for="discount" class="form-label">Discount</label>
        <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount', $orders->discount) }}" min="0">
    </div>

    <div class="mb-3">
        <label for="net_amount" class="form-label">Net Amount</label>
        <input type="number" class="form-control" id="net_amount" name="net_amount" value="{{ old('net_amount', $orders->net_amount) }}" required readonly>
    </div>

    <button type="submit" class="btn btn-primary">Update Purchase Order</button>
</form>
@endsection
