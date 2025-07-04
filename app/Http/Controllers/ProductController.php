<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cache products for 60 minutes
        $products = Cache::remember('products', 60, function () {
            return Product::all();
        });

        return response()->json($products);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'sku' => 'required|string|unique:products,sku',
            'image_url' => 'nullable|url',
            'is_active' => 'boolean',
            'weight' => 'nullable|numeric|min:0',
            'dimensions' => 'nullable|json',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|json',
        ]);

        $product = Product::create($validated);

        // Clear products cache
        Cache::forget('products');

        return response()->json($product, 201);
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Cache::remember("product_{$id}", 60, function () use ($id) {
            return Product::findOrFail($id);
        });

        return response()->json($product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'stock_quantity' => 'sometimes|integer|min:0',
            'sku' => 'sometimes|string|unique:products,sku,' . $product->id,
            'image_url' => 'nullable|url',
            'is_active' => 'sometimes|boolean',
            'weight' => 'nullable|numeric|min:0',
            'dimensions' => 'nullable|json',
            'category' => 'sometimes|string|max:255',
            'tags' => 'nullable|json',
        ]);

        $product->update($validated);

        // Clear relevant caches
        Cache::forget('products');
        Cache::forget("product_{$id}");

        return response()->json($product);
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        // Clear relevant caches
        Cache::forget('products');
        Cache::forget("product_{$id}");

        return response()->json(null, 204);
    }
    /**
 * Get products by category.
 *
 * @param  string  $category
 * @return \Illuminate\Http\Response
 */
public function getByCategory($category)
{
    $products = Cache::remember("products_category_{$category}", 60, function () use ($category) {
        return Product::where('category', $category)->get();
    });

    return response()->json($products);
}

/**
 * Get all active products.
 *
 * @return \Illuminate\Http\Response
 */
public function getActiveProducts()
{
    $products = Cache::remember('active_products', 60, function () {
        return Product::where('is_active', true)->get();
    });

    return response()->json($products);
}
}