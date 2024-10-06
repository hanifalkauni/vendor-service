<?php

namespace App\Http\Controllers;

use App\Models\VendorCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorCategoryController extends Controller
{
    // Create a new vendor category
    public function createCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:vendor_categories|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = VendorCategory::create(['name' => $request->name]);

        return response()->json(['message' => 'Vendor category created successfully', 'data' => $category], 201);
    }

    // List all vendor categories
    public function listCategories()
    {
        $categories = VendorCategory::all();
        return response()->json($categories);
    }
}

