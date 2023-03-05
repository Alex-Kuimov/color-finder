<?php
namespace App\Services;

use App\Models\Color;
use Symfony\Component\DomCrawler\Crawler;

class ParserService
{

    public function parseColors($file)
    {
        $html = file_get_contents(storage_path() . '/app/public/in/' . $file);
        $crawler = new Crawler($html);

        $colors = $crawler->filter('.palette')->each(function (Crawler $node, $i) {
            $arr = [];
            $arr[] = $node->children('.c0 span')->text();
            $arr[] = $node->children('.c1 span')->text();
            $arr[] = $node->children('.c2 span')->text();
            $arr[] = $node->children('.c3 span')->text();
            return $arr;
        });

        foreach ($colors as $color) {
            Color::create(['data' => json_encode($color, JSON_FORCE_OBJECT)]);
        }
    }
}
