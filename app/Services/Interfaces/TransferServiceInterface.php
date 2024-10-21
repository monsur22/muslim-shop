<?php

namespace App\Services\Interfaces;

interface TransferServiceInterface
{
    public function transferProduct($data);

    public function successResponse();

    public function errorResponse($message);
 
}
