<?php
namespace Database\Factories;

use App\Models\Model;
use Str;
use Exception;

class BillAPIFactory
{
    /**
     * Make New model for api requests
     *
     * @param int $building_id
     * @param int $category_id
     * @param int $max_item
     * @return array
     * @throws Exception
     */
    public static function make($building_id  = 1 ,  $category_id = 1 , $max_item = 10)
    {
        $faker = \Faker\Factory::create();
        $bill  = [
            'name' => $faker->name,
            'description' => $faker->text(160),
            'price' => (string)random_int(100000000 , 900000000 ),
            'image_url' => $faker->imageUrl(),
            'items'=>[],
            'building_id'=>$building_id,
            'category_id' =>$category_id
        ];
        $number_of_items = random_int(5 , $max_item);

        for ( $i = 0 ; $i < $number_of_items ; $i = $i + 1){
            $bill['items'][] = ItemAPIFactory::make();

        }
        return $bill;
    }
}
