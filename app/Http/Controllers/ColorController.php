<?php

namespace App\Http\Controllers;

use App\Services\ColorService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function getData(Request $request, ColorService $color)
    {
        return response()->json([
            'colors' => $color->findAvailableColors($request->color),
            'pairs' => $color->findPairs($request->color),
            'pallets' => $color->findPalletColors($request->color),
        ]);
    }
}
