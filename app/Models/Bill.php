<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table    = 'bill';
    protected $fillable = ['customer_id', 'total', 'payment', 'dateorder', 'note', 'status'];
    protected $guarded  = ['created_at', 'updated_at'];
    public  $timestamps = true;
}
