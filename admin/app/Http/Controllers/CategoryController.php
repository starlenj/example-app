<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(StoreCategoryRequest $request)
    {
        $category =  Category::create($request);

        return response()->json([
            "status" => true,
            "message" => "Category Created",
            "data" => $category
        ], 200);
    }
    public function index(Request $request)
    {
        $category = Category::all();
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $category
        ], 200);
    }
    public function get(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                "status" => false,
                "message" => "Category not found",
                "data" => []
            ], 404);
        }
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $category
        ], 200);
    }
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->update($request);
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => $category
            ], 200);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Category not found",
                "data" => null
            ], 404);
        }
    }
    public function delete(StoreCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete($request);
            return response()->json([
                "status" => true,
                "message" => "Category is deleted ",
                "data" => null
            ], 200);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Category not found",
                "data" => null
            ], 404);
        }
    }
}
