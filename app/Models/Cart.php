<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = ['id', 'customer_id', 'product_id', 'color_id', 'size_id', 'quantity'];
    protected $guarded  = ['created_at', 'updated_at'];
    public  $timestamps = true;
}
