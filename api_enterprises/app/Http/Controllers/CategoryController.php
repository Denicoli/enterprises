<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\V1\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::paginate(20));
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return response()->json("Category Created");
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return response()->json("Category Updated");
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json("Category Deleted");
    }

    public function deleteAll()
    {
        Category::query()->delete();

        return response()->json("All Categories Deleted");
    }
}
