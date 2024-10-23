<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseOrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   // return view('welcome');
   return redirect()->route('suppliers.index');
});
// Supplier Routes
Route::resource('suppliers', SupplierController::class);


// Item Routes
Route::resource('items', ItemController::class);

// Purchase Order Routes
Route::resource('orders', PurchaseOrderController::class);
Route::get('/orders/{id}/print', [PurchaseOrderController::class, 'print'])->name('orders.print');
