<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use App\Services\BrandService;
use App\Services\Interfaces\BrandServiceInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandServiceInterface $brandService)
    {
        $this->brandService = $brandService;
    }

       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $brands = $this->brandService->index();
            return BrandResource::collection($brands);
        } catch (\Exception $e) {
            Log::error('Error fetching brands: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch brands'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        try {
            $brand = $this->brandService->store($request);
            return new BrandResource($brand);
        } catch (\Exception $e) {
            Log::error('Error storing brand: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to store brand'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        try {
            $brand->load('images');
            return new BrandResource($brand);
        } catch (\Exception $e) {
            Log::error('Error fetching brand: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch brand'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        try {
            $brand = $this->brandService->update($request, $brand);
            return new BrandResource($brand);
        } catch (\Exception $e) {
            Log::error('Error updating brand: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update brand'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $this->brandService->destroy($brand);
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            Log::error('Error deleting brand: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete brand'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
