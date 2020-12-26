<?php
namespace Database\Factories;

use App\Models\Model;
use Str;
use Exception;
class ItemAPIFactory
{

    /**
     * Make New model for api requests
     *
     * @return array
     * @throws Exception
     */
    public static function make()
    {
        $faker = \Faker\Factory::create();
        $categories = ['scarf' , 'hat' , 'coat', 'boots' , 'miters', 'bathing suit', 'belt','sunglasses','sandals', 'shoes', 'shorts', 'T-shirt', 'pants' ,'socks','pajamas' , 'skirt' , 'dress'];

        return [
            'name' => $categories[array_rand($categories)] . " " . $faker->safeColorName,
            'price' => random_int(50000 , 100000),
            'count' => random_int(10 , 100),
        ];
    }
}
