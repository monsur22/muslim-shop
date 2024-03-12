<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $searchName = $request->input('search_name');
        $searchDesc = $request->input('search_desc');

        $brands = Brand::query();

        if ($searchName) {
            $brands->where('name', 'like', '%' . $searchName . '%');
        }

        if ($searchDesc) {
            $brands->where('desc', 'like', '%' . $searchDesc . '%');
        }

        $data = $brands->paginate(5);

        return view('pages/admin/brand/index', compact('data'));
        // return view('pages/admin/brand/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/admin/brand/add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages/admin/brand/edit',['brandId' => $id]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd("hello");
        $brand = Brand::find($id);

        // Check if the brand has an image
        if ($brand->image) {
            // Delete the image file from the storage
            Storage::disk('public')->delete($brand->image);
        }

        // Delete the Brand
        $brand->delete();

        session()->flash('message', 'Brand Deleted Successfully.');
        return redirect()->route('brands.index');

    }
}
