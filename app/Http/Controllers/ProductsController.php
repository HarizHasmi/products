<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // GET /api/products
    public function index(){
        $products = Product::all();
        return response()->json($products, 200);
    }

    // GET /api/products/{id}
    public function show($id){
        $product = Product::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $product
        ], 200);
    }

    // POST /api/products
    public function store(Request $request){
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'integer|min:0'
        ]);

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'data' => $product
        ], 201);
    }

    // PUT /api/products/{id}
    public function update(Request $request, $id){
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'string|max:255',
            'description' => 'string',
            'price'       => 'numeric',
            'stock'       => 'integer|min:0'
        ]);

        $product->update($validated);

        return response()->json([
            'success' => true,
            'data' => $product
        ], 200);
    }

    // DELETE /api/products/{id}
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'succes' => true,
            'message' => 'Product deleted successfully'
        ], 200);
    }
}
