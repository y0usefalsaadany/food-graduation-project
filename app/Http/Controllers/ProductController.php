<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('products', 'public');
        $product = Product::create($data);
        return response()->json([
            "data" => new ProductResource($product)
        ]);
    }

    public function new()
    {
        $products = Product::with('category')->latest()->get()->take(10);
        return response()->json([
            "data" => ProductResource::collection($products)
        ]);
    }
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return response()->json([
            "data" => ProductResource::collection($products)
        ]);
    }
}
