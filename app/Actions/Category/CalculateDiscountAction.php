<?php

namespace App\Actions\GameLobby;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class CalculateDiscountAction
{
    public function execute(): JsonResponse
    {
        return response()->json();
    }
}