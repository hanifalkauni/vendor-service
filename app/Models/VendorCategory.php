<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'vendor_category_mappings', 'category_id', 'vendor_id');
    }
}

