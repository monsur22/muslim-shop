<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use App\Services\Interfaces\StoreInterface;
use App\Services\StoreService;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    protected $storeService;

    public function __construct(StoreInterface $storeService)
    {
        $this->storeService = $storeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $store = $this->storeService->index();
        return StoreResource::collection($store);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $store = $this->storeService->store($request);
        return new StoreResource($store);
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return new StoreResource($store->load('images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        $store = $this->storeService->update($request, $store);
        return new StoreResource($store);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $this->storeService->destroy($store);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
