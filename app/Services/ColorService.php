<?php
namespace App\Services;

use App\Models\Color;
use App\Models\DataColor;

class ColorService
{
    public function find($color)
    {
        $colors = [];
        $result = [];

        $items = $this->findAvailableColors($color);

        foreach ($items as $item) {
            $res = $this->findPairs($item);
            if ($res) {
                foreach ($res as $cl) {
                    $colors[] = $cl;
                }

            }
        }

        return array_slice($colors, 0, 40);
    }

    public function findAvailableColors($color)
    {
        $availableColors = $this->getAvailableColors();

        $found = [];
        $count = count($availableColors);

        for ($i = 0; $i < $count; $i++) {
            list($r, $g, $b) = array_map('hexdec', str_split(trim($availableColors[$i], '#'), 2));
            list($cr, $cg, $cb) = array_map('hexdec', str_split(trim($color, '#'), 2));

            $delta = sqrt(pow($cr - $r, 2) + pow($cg - $g, 2) + pow($cb - $b, 2));

            if ($delta >= 2 and $delta <= 50) {
                $found[$i] = $availableColors[$i];
            }
        }

        return array_slice(array_values($found), 0, 12);
    }

    public function findPalletColors($color)
    {
        $arr = [];
        $colors = $this->findAvailableColors($color);
        $items = Color::all();

        foreach ($items as $item) {
            $cl = json_decode($item->data, true);

            foreach ($colors as $color) {
                if (in_array($color, $cl)) {
                    $arr[] = $cl;
                }
            }

        }

        return array_slice(array_values($arr), 0, 12);
    }

    private function getAvailableColors()
    {
        $arr = [];
        $items = DataColor::all();

        foreach ($items as $item) {
            $cl = json_decode($item->data, true);

            if (count($cl) === 1) {
                $arr[] = $cl[0];
            }
        }

        return $arr;
    }

    private function findPairs($color)
    {
        if (empty($color)) {
            return null;
        }

        $items = DataColor::all();

        $arr = [];
        foreach ($items as $item) {
            $cl = json_decode($item->data, true);

            if (count($cl) === 2 && in_array($color, $cl)) {
                $arr[] = $cl;
            }
        }
        return $arr;
    }

}
