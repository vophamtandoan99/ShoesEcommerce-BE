<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $table    = 'product';
    protected $fillable = ['name','amount','img','note','import_price','export_price','sale','status','supplier_id','category_id'];
    protected $guarded  = ['created_at', 'updated_at'];
    public $timestamps  = true;
}
