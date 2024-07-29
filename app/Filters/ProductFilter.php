<?php 

namespace App\Filters;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductFilter
{
    protected $request;
    protected $query;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->query = Product::query();
    }

    public function apply()
    {
        $this->applyFilters()
             ->applySearch();

        return $this->query;
    }

    protected function applyFilters()
    {
        $filters = [
            'category_id' => $this->request->query('category_id'),
            'supplier_id' => $this->request->query('supplier_id'),
            'brand_id' => $this->request->query('brand_id'),
            'store_id' => $this->request->query('store_id'),
            'status' => $this->request->query('status')
        ];

        $this->query->filter($filters);

        return $this;
    }

    protected function applySearch()
    {
        $searchTerm = $this->request->query('search');
        $this->query->search($searchTerm);

        return $this;
    }
}
