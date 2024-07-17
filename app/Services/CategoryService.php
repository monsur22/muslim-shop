<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public function getAllCategories()
    {
        return Category::with('images')->get();
    }

    public function createCategory(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $category->images()->create([
                'url' => $path,
            ]);
        }

        return $category->load('images');
    }

    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function updateCategory(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        if ($request->hasFile('image')) {
            if ($category->images()->exists()) {
                Storage::disk('public')->delete($category->images()->first()->url);
                $category->images()->delete();
            }

            $path = $request->file('image')->store('images', 'public');
            $category->images()->create([
                'url' => $path,
            ]);
        }

        return $category->load('images');
    }

    public function deleteCategory(Category $category)
    {
        if ($category->images()->exists()) {
            Storage::disk('public')->delete($category->images()->first()->url);
            $category->images()->delete();
        }
        $category->delete();
    }
}
