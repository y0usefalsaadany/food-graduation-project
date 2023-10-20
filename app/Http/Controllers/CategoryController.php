<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return response()->json([
            "data" => $category
        ]);
    }

    public function list()
    {
        $categories = Category::select('id', 'name')->latest()->get();
        return response()->json([
            "data" => $categories
        ]);
    }
    public function index()
    {
        $categories = Category::with('products')->latest()->get();
        return response()->json([
            "data" => $categories
        ]);
    }
    public function show($id)
    {
        $categories = Category::find($id)->with('products')->latest();
        return response()->json([
            "data" => $categories
        ]);
    }
}
