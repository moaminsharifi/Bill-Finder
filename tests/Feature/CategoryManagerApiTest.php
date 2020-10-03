<?php

namespace Tests\Feature;

use App\Models\Building;
use App\Models\User;
use Database\Factories\BuildingAPIFactory;
use Database\Factories\UserAPIFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use Database\Factories\CategoryAPIFactory;
class CategoryManagerApiTest extends TestCase
{
    /**
     * Check Categories Functionality
     * @test
     * @group category
     * @return void
     */
    public function createAndUpdateAndListCategoryTest()
    {
        /**
         * 1. Create User
         * 2. Convert User To Admin
         * 3. Create New Category
         * 4. Check exists of Category
         * 5. Update Category
         * 6. Get List of Category
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
         * 3. Create New Category
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
         * 4. Check exists of Category
         */
        $category = Category::find($category_id)->first();

        $response = $this->json('GET','/api/category/'.$category_id ,$header);
        $jsonStructForCheckBuilding = [
            'ok',
            'data'=>[
                'id',
                'name',
                'description',
                'image_url',

            ]
        ];
        $response
            ->assertStatus(200)
            ->assertJsonStructure($jsonStructForCheckBuilding)
            ->assertJson([
                'ok'=>1,
                'data'=>$category->toArray()
            ]);

        /**
         * 5. Update Category
         */
        $categoryForUpdate = CategoryAPIFactory::make();
        $response = $this->json('PATCH','/api/category/'.$category_id ,$categoryForUpdate,$header);
        $categoryForUpdate['id'] = $category_id;
        $response
            ->assertStatus(200)
            ->assertJsonStructure($jsonStructForCheckBuilding)
            ->assertJson([
                'ok'=>1,
                'data'=>$categoryForUpdate
            ]);

        /**
         * 6. Get List of Building
         * 6. Get List of Building
         */

        for ($i = 0 ; $i < 10 ; $i += 1 ){
            $category = CategoryAPIFactory::make();
            $this->json('POST','/api/category' ,$category ,$header);
        }

        $response = $this->json('GET','/api/category' ,$header);

        $response
            ->assertStatus(200)
        ;
    }
}
