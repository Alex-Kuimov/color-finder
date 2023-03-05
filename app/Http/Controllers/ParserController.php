<?php

namespace App\Http\Controllers;

use App\Services\ColorService;
use App\Services\MLService;
use App\Services\ParserService;

class ParserController extends Controller
{
    public function getData(ParserService $parser, MLService $ml, ColorService $color)
    {
        //ini_set('max_execution_time', 180); //3 minutes

        // $parser->parseColors('list.html');
        // $ml->learn();

        $find = '#3f153f';

        $colors = $color->find($find);

        //dd($colors);

        return view('parser', [
            'find' => $find,
            'colors' => $colors,
        ]);
    }
}
