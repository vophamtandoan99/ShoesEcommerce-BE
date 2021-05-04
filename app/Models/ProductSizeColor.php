<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;

class ProductSizeColor extends Model
{
    use HasFactory;
    protected $table = 'product_size_color';
    protected $fillable = ['product_id', 'size_id', 'color_id', 'amount'];
}
