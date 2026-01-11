<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // GET /api/products
    public function index(){
        abort_if(!Auth::user()->can('products-view'), 403, "You don't have permission to perform this operation");

        $products = Product::all();
        return response()->json($products, 200);
    }

    // GET /api/products/{id}
    public function show($id){
        abort_if(!Auth::user()->can('products-view'), 403, "You don't have permission to perform this operation");

        $product = Product::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $product
        ], 200);
    }

    // POST /api/products
    public function store(Request $request){
        abort_if(!Auth::user()->can('products-create'), 403, "You don't have permission to perform this operation");

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'integer|min:0'
        ]);

        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'user_id' => Auth::id()
        ]);

        return response()->json([
            'success' => true,
            'message' => "product created",
            'data' => $product
        ], 201);
    }

    // PUT /api/products/{id}
    public function update(Request $request, $id){
        abort_if(!Auth::user()->can('products-update'), 403, "You don't have permission to perform this operation");

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
    public function destroy($id){
        abort_if(!Auth::user()->can('products-delete'), 403, "You don't have permission to perform this operation");

        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'succes' => true,
            'message' => 'Product deleted successfully'
        ], 200);
    }
}
