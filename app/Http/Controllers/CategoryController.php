<?php

namespace App\Http\Controllers;

use App\Helpers\CustomResponse;
use App\Models\Building;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CustomResponse
     */
    public function index()
    {
        return CustomResponse::createSuccess(Category::all()->take(20));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return CustomResponse
     */


    public function store()
    {
        $attributes = $this->validateRequestForCreateOrUpdate();
        $category = Category::create($attributes);
        return CustomResponse::createSuccess(['category_id'=>$category->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return CustomResponse
     */
    public function show(Category $category)
    {
        return CustomResponse::createSuccess($category->toArray());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return CustomResponse
     */
    public function update(Category $category)
    {
        $attributes = $this->validateRequestForCreateOrUpdate();
        $category->update($attributes);
        return CustomResponse::createSuccess($category->toArray());
    }

    /**
     * Validate Request for create or update building
     * @return array $attributes
     */
    private function validateRequestForCreateOrUpdate()
    {
        return request()->validate([
            'name' => 'required|string|max:180',
            'description' => 'required|string|max:180',
            'image_url' => 'required|string|max:180',
        ]);
    }
}
