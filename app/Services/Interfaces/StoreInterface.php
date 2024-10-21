<?php

namespace App\Services\Interfaces;

use App\Http\Requests\StoreRequest;
use App\Models\Store;

interface StoreInterface
{
    public function index();

    public function store(StoreRequest $request);

    public function update(StoreRequest $request, Store $store);

    public function destroy(Store $store);
}
