<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable =['id', 'email', 'name', 'phone', 'address'];
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
}
