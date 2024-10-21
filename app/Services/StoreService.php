<?php

namespace App\Services;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use App\Services\Interfaces\StoreInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreService implements StoreInterface
{
    public function index()
    {
        return Store::with('images')->get();
    }

    public function store(StoreRequest $request)
    {
        $store = Store::create($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $store->images()->create([
                'url' => $path,
            ]);
        }

        return $store->load('images');
    }

    public function update(StoreRequest $request, Store $store)
    {
        $store->update($request->only('name'));

        if ($request->hasFile('image')) {
            if ($store->images()->exists()) {
                Storage::disk('public')->delete($store->images()->first()->url);
                $store->images()->delete();
            }

            $path = $request->file('image')->store('images', 'public');
            $store->images()->create([
                'url' => $path,
            ]);
        }

        return $store->load('images');
    }

    public function destroy(Store $store)
    {
        if ($store->images()->exists()) {
            Storage::disk('public')->delete($store->images()->first()->url);
            $store->images()->delete();
        }
        $store->delete();
    }
}
