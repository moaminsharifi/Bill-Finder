<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Database\Factories\CategoryAPIFactory;
use Database\Factories\BuildingAPIFactory;
use Database\Factories\BillAPIFactory;
use App\Models\Bill;
use App\Models\Building;
use App\Models\Category;

class FakeDataGenerator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $admin = User::where('email' , 'bigm@bigm.ir')->first();
        // Make Some Building
        $building_ids = [];
        for ($i=0; $i <10 ; $i++) { 
          $building = Building::create(BuildingAPIFactory::make());
          $building_ids[] = $building->id;
        }
        // Make Some CateGory
        $category_ids = [];
        for ($i=0; $i <10 ; $i++) {
            $attributes = CategoryAPIFactory::make();
            $attributes['image_url'] = 'sample.jpg';
            $category = Category::create($attributes);
            $category_ids[] = $category->id;
        }


        // Make Some Bill
        for ($i=0; $i < 5 ; $i++) { 
            $random_cat_id = $building_ids[array_rand($building_ids)];
            $random_building_id = $category_ids[array_rand($category_ids)];
            $attributes = BillAPIFactory::make($random_building_id,$random_cat_id , 5 );
            $attributes['creator_id'] = $admin->id;
            $bill = Bill::create($attributes);
           

        }
    }
}
