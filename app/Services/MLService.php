<?php
namespace App\Services;

use App\Models\Color;
use App\Models\DataColor;
use Phpml\Association\Apriori;

class MLService
{
    public function learn($file)
    {
        $colors = Color::all();
        $samples = [];
        $labels = [];
        foreach ($colors as $color) {
            $item = json_decode($color->data, true);
            $samples[] = $item;
        }

        $associator = new Apriori($support = 0.0007, $confidence = 0.0007);
        $associator->train($samples, $labels);
        $dataArray = $associator->apriori();

        foreach ($dataArray as $items) {
            foreach ($items as $item) {
                DataColor::create(['data' => json_encode($item, JSON_FORCE_OBJECT)]);
            }
        }
    }
}
