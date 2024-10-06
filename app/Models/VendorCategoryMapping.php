<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorCategoryMapping extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'category_id'
    ];
}

