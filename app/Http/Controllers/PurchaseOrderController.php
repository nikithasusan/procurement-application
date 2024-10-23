<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\Supplier;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = PurchaseOrder::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::where('status', 'Active')->get();
        return view('orders.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'item_total' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'net_amount' => 'required|numeric',
        ]);

        PurchaseOrder::create($request->all());
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orders = PurchaseOrder::findOrFail($id);
        $suppliers = Supplier::where('status', 'Active')->get(); // Get active suppliers
        return view('orders.edit', compact('orders', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'order_date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
            'item_total' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'net_amount' => 'required|numeric|min:0',
        ]);

        $orders = PurchaseOrder::findOrFail($id);
        $orders->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Purchase Order updated successfully.');
    }
    public function print($id)
    {
    $order = PurchaseOrder::with('supplier')->findOrFail($id);
    
    // Render the printable view
    return view('orders.print', compact('order'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orders = PurchaseOrder::findOrFail($id);
        $orders->delete();

        return redirect()->route('orders.index')->with('success', 'Purchase Order deleted successfully.');
    }
}
