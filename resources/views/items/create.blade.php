@extends('layouts.app')

@section('content')
<h2>Add Item</h2>

<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="inventory_location" class="form-label">Inventory Location</label>
        <input type="text" class="form-control" id="inventory_location" name="inventory_location" required>
    </div>

    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" required>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" class="form-control" id="category" name="category" required>
    </div>

    <div class="mb-3">
        <label for="supplier_id" class="form-label">Supplier</label>
        <select class="form-select" id="supplier_id" name="supplier_id">
            @foreach ($suppliers as $supplier)
            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="stock_unit" class="form-label">Stock Unit</label>
        <input type="text" class="form-control" id="stock_unit" name="stock_unit" required>
    </div>

    <div class="mb-3">
        <label for="unit_price" class="form-label">Unit Price</label>
        <input type="number" class="form-control" id="unit_price" name="unit_price" required>
    </div>

    <div class="mb-3">
        <label for="images" class="form-label">Item Images</label>
        <input type="file" class="form-control" id="images" name="images[]" multiple>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="Enabled" selected>Enabled</option>
            <option value="Disabled">Disabled</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
