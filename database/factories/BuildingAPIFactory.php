<?php
namespace Database\Factories;

use App\Models\Model;
use Str;

class BuildingAPIFactory
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
            'email' => $faker->unique()->safeEmail,
            'password' => Str::random(32),
        ];
    }
}
