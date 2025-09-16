<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductApiController extends Controller
{
    public function index() { return Product::orderBy('id','desc')->paginate(10); }

    public function store(ProductStoreRequest $request)
    {
        $p = Product::create($request->validated()); // precio_venta se calcula en el modelo
        return response()->json($p, 201);
    }

    public function show(Product $product) { return $product; }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->validated());
        return $product->fresh();
    }

    public function destroy(Product $product) { $product->delete(); return response()->noContent(); }
}
