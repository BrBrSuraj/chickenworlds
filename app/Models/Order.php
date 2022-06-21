<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'selectedProduct','id');
    }

    public function getTransactionId()
    {
        return time() . auth()->user()->id;
    }



    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    protected $casts = [
        'staff' => 'array',
    ];
}
