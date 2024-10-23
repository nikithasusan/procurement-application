@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h2>Items</h2>
    <a href="{{ route('items.create') }}" class="btn btn-primary">Add Item</a>
</div>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Item No</th>
            <th>Item Name</th>
            <th>Inventory Location</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Stock Unit</th>
            <th>Unit Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->inventory_location }}</td>
            <td>{{ $item->brand }}</td>
            <td>{{ $item->category }}</td>
            <td>{{ $item->supplier->name }}</td> <!-- Assuming the supplier relationship is defined -->
            <td>{{ $item->stock_unit }}</td>
            <td>{{ $item->unit_price }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
