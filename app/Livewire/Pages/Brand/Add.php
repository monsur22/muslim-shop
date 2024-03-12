<?php

namespace App\Livewire\Pages\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;
    public $name, $desc, $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'desc' => 'required|string',
        'image' => 'nullable|image|max:1024', // Example: max file size of 1MB
    ];

    public function render()
    {
        return view('livewire.pages.brand.add');
    }

    public function add()
    {
        $this->validate();

        // Save brand to the database
        $brand = new Brand;
        $brand->name = $this->name;
        $brand->desc = $this->desc;

        if ($this->image) {
            $brand->image = $this->image->store('images', 'public');
        }

        // dd($brand);
        $brand->save();

        // Redirect to brand list page
        // return redirect()->route('brands.index');
        // return redirect()->to('/brands');
        return $this->redirect('/brands');

    }
    public function test()
    {
        dd("test");
    }
}
