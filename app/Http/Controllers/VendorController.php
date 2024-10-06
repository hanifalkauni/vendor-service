<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\VendorCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    // Register a new vendor
    public function registerVendor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:vendors',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:vendor_categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $vendor = Vendor::create($request->only('name', 'email', 'phone_number', 'address'));

        // Assign categories to the vendor
        if ($request->has('categories')) {
            $vendor->categories()->sync($request->categories);
        }

        return response()->json(['message' => 'Vendor registered successfully', 'data' => $vendor], 201);
    }

    // List all vendors
    public function listVendors()
    {
        $vendors = Vendor::with('categories')->get();
        return response()->json($vendors);
    }
}
