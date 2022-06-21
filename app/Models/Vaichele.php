<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaichele extends Model
{
    use HasFactory;

    protected $fillable = ['type','number'];
}
