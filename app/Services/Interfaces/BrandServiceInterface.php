<?php
namespace App\Services\Interfaces;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;

interface BrandServiceInterface
{
    public function index();
    public function store(BrandRequest $request);
    public function update(BrandRequest $request, Brand $brand);
    public function destroy(Brand $brand);
}
