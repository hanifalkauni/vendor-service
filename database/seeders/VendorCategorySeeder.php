<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VendorCategory;

class VendorCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Electronics'],
            ['name' => 'IT Services'],
            ['name' => 'Construction'],
            ['name' => 'Furniture'],
            ['name' => 'Office Supplies'],
        ];

        foreach ($categories as $category) {
            VendorCategory::create($category);
        }
    }
}
