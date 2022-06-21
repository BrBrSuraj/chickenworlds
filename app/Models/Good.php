<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    protected $fillable=['product_id','name','sp'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function invoicesItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function invoice_items()
    {
        return $this->hasMany(InvoiceItem::class);
    }



}

