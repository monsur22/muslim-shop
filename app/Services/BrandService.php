<?php

namespace App\Services;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandService
{
    public function index()
    {
        return Brand::with('images')->get();
    }

    public function store(BrandRequest $request)
    {
        $brand = Brand::create($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $brand->images()->create([
                'url' => $path,
            ]);
        }

        return $brand->load('images');
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->only('name'));

        if ($request->hasFile('image')) {
            if ($brand->images()->exists()) {
                Storage::disk('public')->delete($brand->images()->first()->url);
                $brand->images()->delete();
            }

            $path = $request->file('image')->store('images', 'public');
            $brand->images()->create([
                'url' => $path,
            ]);
        }

        return $brand->load('images');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->images()->exists()) {
            Storage::disk('public')->delete($brand->images()->first()->url);
            $brand->images()->delete();
        }
        $brand->delete();
    }
}
