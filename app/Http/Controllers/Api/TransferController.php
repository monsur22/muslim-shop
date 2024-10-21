<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransferRequest;
use App\Models\ProductInventory;
use App\Models\StockLevel;
use App\Models\Transfer;
use App\Services\Interfaces\TransferServiceInterface;
use App\Services\TransferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    protected $transferService;

    public function __construct(TransferServiceInterface $transferService)
    {
        $this->transferService = $transferService;
    }

    public function transferProduct(TransferRequest $request)
    {
        return $this->transferService->transferProduct($request->all());
    }
}
