@extends('layouts.app')

@section('content')
<h2>Edit Item</h2>

<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $item->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="inventory_location" class="form-label">Inventory Location</label>
        <input type="text" class="form-control" id="inventory_location" name="inventory_location" value="{{ old('inventory_location', $item->inventory_location) }}" required>
    </div>

    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $item->brand) }}" required>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $item->category) }}" required>
    </div>

    <div class="mb-3">
        <label for="supplier_id" class="form-label">Supplier</label>
        <select class="form-select" id="supplier_id" name="supplier_id" required>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $supplier->id == $item->supplier_id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="stock_unit" class="form-label">Stock Unit</label>
        <input type="text" class="form-control" id="stock_unit" name="stock_unit" value="{{ old('stock_unit', $item->stock_unit) }}" required>
    </div>

    <div class="mb-3">
        <label for="unit_price" class="form-label">Unit Price</label>
        <input type="number" step="0.01" class="form-control" id="unit_price" name="unit_price" value="{{ old('unit_price', $item->unit_price) }}" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="Enabled" {{ $item->status === 'Enabled' ? 'selected' : '' }}>Enabled</option>
            <option value="Disabled" {{ $item->status === 'Disabled' ? 'selected' : '' }}>Disabled</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Item</button>
</form>
@endsection
