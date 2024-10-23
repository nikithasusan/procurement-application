<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'inventory_location', 'brand', 'category', 'supplier_id', 'stock_unit', 'unit_price', 'images', 'status'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
