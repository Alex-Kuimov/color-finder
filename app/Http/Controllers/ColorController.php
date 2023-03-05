<?php

namespace App\Http\Controllers;

use App\Services\ColorService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function getData(Request $request, ColorService $color)
    {
        return response()->json([
            'pairs' => $color->find($request->color),
            'colors' => $color->findAvailableColors($request->color),
            'pallets' => $color->findPalletColors($request->color),
        ]);
    }
}
