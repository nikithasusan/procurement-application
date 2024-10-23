@extends('layouts.app')

@section('content')
<h2>Add Supplier</h2>

<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Supplier Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" required></textarea>
    </div>

    <div class="mb-3">
        <label for="tax_no" class="form-label">TAX No</label>
        <input type="text" class="form-control" id="tax_no" name="tax_no" required>
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <select class="form-select" id="country" name="country">
            <option value="USA">USA</option>
            <option value="UK">UK</option>
            <option value="India">India</option>
            <option value="Australia">Australia</option>
            <option value="Canada">Canada</option>
            <option value="Germany">Germany</option>
            <option value="France">France</option>
            <option value="Japan">Japan</option>
            <option value="Brazil">Brazil</option>
            <option value="China">China</option>
            <option value="Russia">Russia</option>
            <option value="Mexico">Mexico</option>
            <option value="South Africa">South Africa</option>

        </select>
    </div>

    <div class="mb-3">
        <label for="mobile_no" class="form-label">Mobile No</label>
        <input type="text" class="form-control" id="mobile_no" name="mobile_no" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="Active" selected>Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Blocked">Blocked</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
