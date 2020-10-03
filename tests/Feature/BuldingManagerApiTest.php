<?php

namespace Tests\Feature;

use App\Models\Building;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\UserAPIFactory;
use Database\Factories\BuildingAPIFactory;

class BuildingManagerApiTest extends TestCase
{
    /**
     * Check Building Functionality
     * @test
     * @group building
     * @return void
     * @throws Exception
     */
    public function createAndUpdateAndListBuildingTest()
    {
        /**
         * 1. Create User
         * 2. Convert User To Admin
         * 3. Create New Building
         * 4. Check exists of Building
         * 5. Update Building
         * 6. Get List of Building
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
         * 3. Create New Building
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
         * 4. Check exists of Building
         */
        $building = Building::find($building_id)->first();

        $response = $this->json('GET','/api/building/'.$building_id ,$header);
        $jsonStructForCheckBuilding = [
            'ok',
            'data'=>[
                'id',
                'name',
                'address',
                'city',
                'google_map_url'
            ]
        ];
        $response
            ->assertStatus(200)
            ->assertJsonStructure($jsonStructForCheckBuilding)
            ->assertJson([
                'ok'=>1,
                'data'=>$building->toArray()
            ]);

        /**
         * 5. Update Building
         */
        $buildingForUpdate = BuildingAPIFactory::make();
        $response = $this->json('PATCH','/api/building/'.$building_id ,$buildingForUpdate,$header);
        $buildingForUpdate['id'] = $building_id;
        $response
            ->assertStatus(200)
            ->assertJsonStructure($jsonStructForCheckBuilding)
            ->assertJson([
                'ok'=>1,
                'data'=>$buildingForUpdate
            ]);

        /**
         * 6. Get List of Building
         */

        for ($i = 0 ; $i < 10 ; $i += 1 ){
            $building = BuildingAPIFactory::make();
            $this->json('POST','/api/building' ,$building ,$header);
        }

        $response = $this->json('GET','/api/building' ,$header);


        print_r(json_decode($response->getContent()));
        $response
            ->assertStatus(200)
           ;



















    }
}
