<?php

namespace App\Livewire\Pages\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $brand, $name, $desc, $image;
    public function mount($brandId)
    {
        $this->brand = Brand::findOrFail($brandId);
        $this->name = $this->brand->name;
        $this->desc = $this->brand->desc;
        // $this->image = $this->brand->image;
    }
    public function render()
    {
        return view('livewire.pages.brand.edit');
    }

    public function updateBrand()
    {
        $rules = [
            'name' => 'required',
            'desc' => 'required',
            'image' => 'nullable',
        ];

        // Add image validation rule conditionally
        if ($this->image) {
            $rules['image'] .= '|image|max:1024';
        }

        $this->validate($rules);

        if ($this->image) {
            if ($this->brand->image) {
                Storage::disk('public')->delete($this->brand->image);
            }

            $this->brand->image = $this->image->store('images', 'public');
        }
        $this->brand->name = $this->name;
        $this->brand->desc = $this->desc;
        $this->brand->save();

        session()->flash('success', 'Brand updated successfully.');

        // return redirect()->route('brands.index');
        // return redirect()->to('/brands');
        return redirect('/brands');

    }
}
