@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h2>Suppliers</h2>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add Supplier</a>
</div>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Supplier No</th>
            <th>Supplier Name</th>
            <th>Address</th>
            <th>TAX No</th>
            <th>Country</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->id }}</td>
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->address }}</td>
            <td>{{ $supplier->tax_no }}</td>
            <td>{{ $supplier->country }}</td>
            <td>{{ $supplier->mobile_no }}</td>
            <td>{{ $supplier->email }}</td>
            <td>{{ $supplier->status }}</td>
            <td>
                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
