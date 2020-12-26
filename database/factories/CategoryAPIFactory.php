<?php
namespace Database\Factories;

use App\Models\Model;
use Str;
class CategoryAPIFactory
{
    /**
     * Make New model for api requests
     *
     * @return array
     */
    public static function make()
    {
        $faker = \Faker\Factory::create();
        // type from http://clipart-library.com/clipart/n1215775.htm
        $categories = ['scarf' , 'hat' , 'coat', 'boots' , 'miters', 'bathing suit', 'belt','sunglasses','sandals', 'shoes', 'shorts', 'T-shirt', 'pants' ,'socks','pajamas' , 'skirt' , 'dress'];
        return [
            'name' => $categories[array_rand($categories)] . " " . $faker->safeColorName ,
            'description' => $faker->text(150),
            'image_url' => $faker->imageUrl(),
        ];
    }
}
