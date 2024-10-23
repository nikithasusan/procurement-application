@extends('layouts.app')

@section('content')
<h2>Create Purchase Order</h2>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="supplier_id" class="form-label">Supplier</label>
        <select class="form-select" id="supplier_id" name="supplier_id" required>
            <option value="">Select Supplier</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="order_date" class="form-label">Order Date</label>
        <input type="date" class="form-control" id="order_date" name="order_date" value="{{ date('Y-m-d') }}" required>
    </div>

    <div class="mb-3">
        <label for="item_total" class="form-label">Item Total</label>
        <input type="number" class="form-control" id="item_total" name="item_total" readonly>
    </div>

    <div class="mb-3">
        <label for="discount" class="form-label">Discount</label>
        <input type="number" class="form-control" id="discount" name="discount" value="0" readonly>
    </div>

    <div class="mb-3">
        <label for="net_amount" class="form-label">Net Amount</label>
        <input type="number" class="form-control" id="net_amount" name="net_amount" readonly>
    </div>

    <h4>Item List</h4>
    <table class="table table-bordered" id="item-list">
        <thead>
            <tr>
                <th>Select</th>
                <th>Item No</th>
                <th>Item Name</th>
                <th>Stock Unit</th>
                <th>Unit Price</th>
                <th>Packing Unit</th>
                <th>Order Qty</th>
                <th>Item Amount</th>
                <th>Discount</th>
                <th>Net Amount</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item rows will be added here dynamically -->
        </tbody>
    </table>

    <div class="mb-3">
        <button type="button" class="btn btn-secondary" id="add-item-btn">Add Item</button>
    </div>

    <button type="submit" class="btn btn-primary">Create Order</button>
</form>

<script>
    let itemCounter = 0;
    const itemList = document.getElementById('item-list').getElementsByTagName('tbody')[0];
    const itemTotalField = document.getElementById('item_total');
    const discountField = document.getElementById('discount');
    const netAmountField = document.getElementById('net_amount');

    document.getElementById('add-item-btn').addEventListener('click', function() {
        const row = itemList.insertRow();
        row.innerHTML = `
            <td><input type="checkbox" class="item-select"></td>
            <td><input type="text" name="items[${itemCounter}][item_no]" class="form-control" required></td>
            <td><input type="text" name="items[${itemCounter}][item_name]" class="form-control" required></td>
            <td><input type="text" name="items[${itemCounter}][stock_unit]" class="form-control" required></td>
            <td><input type="number" name="items[${itemCounter}][unit_price]" class="form-control" required></td>
            <td><input type="text" name="items[${itemCounter}][packing_unit]" class="form-control" required></td>
            <td><input type="number" name="items[${itemCounter}][order_qty]" class="form-control order-qty" required></td>
            <td><input type="number" name="items[${itemCounter}][item_amount]" class="form-control item-amount" readonly></td>
            <td><input type="number" name="items[${itemCounter}][discount]" class="form-control item-discount" value="0"></td>
            <td><input type="number" name="items[${itemCounter}][net_amount]" class="form-control net-amount" readonly></td>
        `;
        
        itemCounter++;
    });

    // Event delegation to calculate item amounts and net amount
    itemList.addEventListener('input', function(e) {
        if (e.target.matches('.order-qty, .item-discount')) {
            const row = e.target.closest('tr');
            const unitPrice = parseFloat(row.querySelector('input[name*="unit_price"]').value) || 0;
            const orderQty = parseFloat(row.querySelector('.order-qty').value) || 0;
            const discount = parseFloat(row.querySelector('.item-discount').value) || 0;

            const itemAmount = unitPrice * orderQty;
            const netAmount = itemAmount - discount;

            row.querySelector('.item-amount').value = itemAmount.toFixed(2);
            row.querySelector('.net-amount').value = netAmount.toFixed(2);

            // Update totals
            updateTotals();
        }
    });

    function updateTotals() {
        let itemTotal = 0;
        let discountTotal = 0;

        Array.from(itemList.getElementsByTagName('tr')).forEach(row => {
            const itemAmount = parseFloat(row.querySelector('.item-amount').value) || 0;
            const discount = parseFloat(row.querySelector('.item-discount').value) || 0;

            itemTotal += itemAmount;
            discountTotal += discount;
        });

        itemTotalField.value = itemTotal.toFixed(2);
        discountField.value = discountTotal.toFixed(2);
        netAmountField.value = (itemTotal - discountTotal).toFixed(2);
    }
</script>
@endsection
