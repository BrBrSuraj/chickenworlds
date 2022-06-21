<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function goods()
    {
        return $this->hasManyThrough(Good::class,Product::class);
    }


    protected function name(): Attribute
     {
         return new Attribute(
            set: fn ($value) => \strtoupper($value)
         );

    }
}
