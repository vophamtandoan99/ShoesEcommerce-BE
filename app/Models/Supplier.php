<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Supplier extends Model
{
    use HasFactory;
    protected $table        = 'supplier';
    protected $fillable     = ['category_id', 'name', 'address', 'phone', 'status'];
    protected $primaryKey   = 'id';
    protected $guarded      = ['created_at', 'updated_at'];
    public    $timestamps   = true;
}
