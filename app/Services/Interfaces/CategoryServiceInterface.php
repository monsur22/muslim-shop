<?php

namespace App\Services\Interfaces;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

interface CategoryServiceInterface
{
    public function getAllCategories();

    public function createCategory(CategoryRequest $request);

    public function updateCategory(CategoryRequest $request, Category $category);

    public function deleteCategory(Category $category);
}
