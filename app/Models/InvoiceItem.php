<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = ['product_id','good_id', 'invoice_id', 'quantity','price','total'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function good()
    {
        return $this->belongsTo(Good::class);
    }
}

