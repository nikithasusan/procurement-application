@extends('layouts.app')

@section('content')
<h2>Edit Supplier</h2>

<form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Supplier Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $supplier->address) }}" required>
    </div>

    <div class="mb-3">
        <label for="tax_no" class="form-label">TAX No</label>
        <input type="text" class="form-control" id="tax_no" name="tax_no" value="{{ old('tax_no', $supplier->tax_no) }}" required>
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $supplier->country) }}" required>
    </div>

    <div class="mb-3">
        <label for="mobile_no" class="form-label">Mobile No</label>
        <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{ old('mobile_no', $supplier->mobile_no) }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $supplier->email) }}" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="Active" {{ $supplier->status === 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ $supplier->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
            <option value="Blocked" {{ $supplier->status === 'Blocked' ? 'selected' : '' }}>Blocked</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Supplier</button>
</form>
@endsection
