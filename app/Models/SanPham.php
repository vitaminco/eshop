<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $fillable = ["ten_san_pham"];
    protected $fillable1 = ["gia"];
    protected $fillable2 = ["mo_ta"];
}
