<?php

namespace App\Services\Interfaces;

interface SalesServiceInterface
{
    public function getAllSales();

    public function processReturn($sale, $items);

    public function createSalesReturn($saleId, $orderItemId, $quantity, $amount);

    public function updateStockLevel($productId, $storeId, $quantity);

    public function adjustSaleAmount($sale, $totalReturnAmount);

    public function getSalesById($id);
}
