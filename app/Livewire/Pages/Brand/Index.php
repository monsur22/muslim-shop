<?php

namespace App\Livewire\Pages\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination ;

    public $brand, $name, $desc, $image, $brandIdToDelete;
    use WithPagination;

    public $perPage = 5;
    public $searchName = '';
    public $searchDesc = '';

    public function render()
    {
        // Filter data based on search criteria
        $data = Brand::query();

        if ($this->searchName) {
            $data->where('name', 'like', '%' . $this->searchName . '%');
        }

        if ($this->searchDesc) {
            $data->where('desc', 'like', '%' . $this->searchDesc . '%');
        }

        $data = $data->paginate($this->perPage);

        return view('livewire.pages.brand.index', ['data' => $data]);
    }

    public function search()
    {
        $this->resetPage();
    }
    // public function delete($brandIdToDelete)
    // {
    //     // Delete the Brand
    //     $brand = Brand::find($brandIdToDelete);
    //     if ($brand) {
    //         // Check if the brand has an image
    //         if ($brand->image) {
    //             // Delete the image file from the storage
    //             Storage::disk('public')->delete($brand->image);
    //         }
    //         // Delete the Brand
    //         $brand->delete();
    //         // Flash success message
    //         session()->flash('message', 'Brand Deleted Successfully.');
    //     }

    //     // Reset the brandIdToDelete
    //     $this->brandIdToDelete = null;

    //     // $this->dispatch('refreshDataTable');

    // }
    public function delete($brandIdToDelete)
{
    // Delete the Brand
    $brand = Brand::find($brandIdToDelete);
    if ($brand) {
        // Check if the brand has an image
        if ($brand->image) {
            // Delete the image file from the storage
            Storage::disk('public')->delete($brand->image);
        }
        // Delete the Brand
        $brand->delete();
        // Flash success message
        session()->flash('message', 'Brand Deleted Successfully.');
    }

    // Reset the brandIdToDelete
    $this->brandIdToDelete = null;
    $this->render(); // This will re-run the render method and fetch fresh data
    // Alternatively, you can also use the following line to refresh the data without re-rendering the entire component:
    $this->data = Brand::paginate($this->perPage);


    // Adjust pagination if the current page becomes empty
    if ($this->data->isEmpty() && $this->data->currentPage() > 1) {
        $this->data = Brand::paginate($this->perPage, ['*'], 'page', $this->data->currentPage() - 1);
    }
}

}
