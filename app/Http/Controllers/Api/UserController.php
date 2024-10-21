<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(Request $request): JsonResponse
    {
        // Access the authenticated user
        $user = $request->user();

        return response()->json([
            'message' => 'Authenticated user retrieved successfully',
            'user' => $user,
        ]);
    }
}
