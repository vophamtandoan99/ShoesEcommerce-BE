<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table        = 'bills_detail';
    protected $fillable     = ['id_bill', 'id_product_size_color', 'amount', 'price'];
    protected $guarded      = ['created_at', 'updated_at'];
    public    $timestamps   = true;
}
