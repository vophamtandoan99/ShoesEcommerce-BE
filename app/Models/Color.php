<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSizeColor;

class Color extends Model
{
    use HasFactory;
    protected $table = 'color';
    protected $fillable = ['id', 'color'];
    // public function product()
    // {
    //     return $this->belongTo('App\Models\Product');
    // }
}
