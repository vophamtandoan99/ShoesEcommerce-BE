<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable =['id', 'email', 'name', 'phone', 'address', 'password'];
    protected $hidden   = ['password'];
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
}
