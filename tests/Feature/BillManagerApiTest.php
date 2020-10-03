<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Database\Factories\UserAPIFactory;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\CategoryAPIFactory;
use Database\Factories\BuildingAPIFactory;
use Database\Factories\BillAPIFactory;
use App\Models\Bill;
class BillManagerApiTest extends TestCase
{
    /**
     * Check Bill Functionality also check with Category , Item , Building
     * @test
     * @group bill
     * @return void
     * @throws Exception
     */
    public function createAndUpdateAndListBilTest()
    {
        /**
         * 1. Create New User
         * 2. Convert User From Step 1 To Admin
         * 3. Create New Bill
         *      3.1. Create New Category and get ID
         *      3.2. Create New Building and get ID
         *      3.3. Create New Bill with Items, Get Bill ID and Items IDs
         * 4. Check existence of Bill and Items
         *     4.1 check existence in DB
         *     4.2 check existence with api
         * 5. Update Bill
         *   5.1 update Bill Base Data (Category , Building , Items)
         * 6. Get List of Bill
         */




        /**
         * 1. create User
         */

        $user = UserAPIFactory::make();
        $jsonStructForLogin = [
            'ok',
            'data'=>[
                'token',
                'token_type',
                'is_admin',
                'name',
                'email'
            ]
        ];
        $response = $this->json('POST' , 'api/auth/signup', $user);

        $response->assertStatus(200)
            ->assertJsonStructure(
                $jsonStructForLogin
            );
        $this->assertDatabaseHas('users', ['email'=>$user['email']]);
        /**
         * 2. Convert User To Admin
         */
        $Manager = User::where('email', $user['email'])->first();
        $Manager->setAdmin();
        if(!$Manager->isAdmin()){
            $this->assert(false);
        }

        /**
         * 3. Create New Bill
         */

        /**
         * 3.1. Create New Category and get ID
         */

        $response = $this->json('POST','/api/auth/login', $user)
            ->assertStatus(200)
            ->assertJsonStructure($jsonStructForLogin);
        $responseAsObject = json_decode($response->getContent());
        $header = [
            'HTTP_Authorization' => 'Bearer ' . $responseAsObject->data->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];


        $category = CategoryAPIFactory::make();
        $response = $this->json('POST','/api/category' ,$category ,$header);


        $jsonStructForAddBuilding = [
            'ok',
            'data'=>[
                'category_id',
            ]
        ];
        $category_id = json_decode($response->getContent())->data->category_id;
        $this->assertDatabaseHas('categories', ['id'=>$category_id]);
        $response->assertStatus(200)
            ->assertJsonStructure(
                $jsonStructForAddBuilding
            );
        /**
         * 3.2. Create New Building and get ID
         */

        $building = BuildingAPIFactory::make();
        $response = $this->json('POST','/api/building' ,$building ,$header);


        $jsonStructForAddBuilding = [
            'ok',
            'data'=>[
                'building_id',
            ]
        ];
        $building_id = json_decode($response->getContent())->data->building_id;
        $this->assertDatabaseHas('buildings', ['id'=>$building_id]);
        $response->assertStatus(200)
            ->assertJsonStructure(
                $jsonStructForAddBuilding
            );

        /**
         * 3.3. Make New Bill
         */
        $jsonStructForAddBill= [
            'ok',
            'data'=>[
                'bill_id',
                'items'
            ]
        ];
        $bill = BillAPIFactory::make($building_id  , $category_id);

        $response = $this->json('POST','/api/bill' ,$bill ,$header);

        $response->assertStatus(200)
            ->assertJsonStructure(
                $jsonStructForAddBill
            );

        /**
         * 4. Check existence of Bill and Items
         */

        /**
         * 4.1 check existence in DB
         */

        $bill_id = json_decode($response->getContent())->data->bill_id;
        $items = json_decode($response->getContent())->data->items;
        $this->assertDatabaseHas('bills', ['id'=>$bill_id]);

        foreach ($items as $item){
            $this->assertDatabaseHas('items', ['id'=>$item->id]);
        }
        /**
         * 4.2 check existence with api
         */
        $bill = Bill::find($bill_id)->first();
        $jsonStructForCheckBill = [
            'ok',
            'data'=>[
                $bill->toArray()
            ]
        ];

        $response = $this->json('GET' , 'api/bill/'.$bill_id , $header);
        print_r(json_decode($response->getContent()));
        $response->assertStatus(200)
            ->assertJsonStructure(
                $jsonStructForCheckBill
            );










    }
}
