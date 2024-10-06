<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'registration_status'
    ];

    public function categories()
    {
        return $this->belongsToMany(VendorCategory::class, 'vendor_category_mappings', 'vendor_id', 'category_id');
    }
}

