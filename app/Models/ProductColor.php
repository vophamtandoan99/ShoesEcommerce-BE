<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_color';
    protected $fillable = ['product_id', 'color'];
    public function product()
    {
        return $this->belongTo('App\Models\Product');
    }
}
