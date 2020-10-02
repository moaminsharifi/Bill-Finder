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

        return [
            'name' => $faker->name,
            'description' => $faker->text(150),
            'image_url' => $faker->imageUrl(),
        ];
    }
}
