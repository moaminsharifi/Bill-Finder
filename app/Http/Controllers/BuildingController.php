<?php

namespace App\Http\Controllers;

use App\Helpers\CustomResponse;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CustomResponse
     */
    public function index()
    {
        return CustomResponse::createSuccess(Building::all()->take(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return CustomResponse
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CustomResponse
     */


    public function store()
    {
        $attributes = $this->validateRequestForCreateOrUpdate();
        $building = Building::create($attributes);
        return CustomResponse::createSuccess(['building_id'=>$building->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return CustomResponse
     */
    public function show(Building $building)
    {
        return CustomResponse::createSuccess($building->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return CustomResponse
     */
    public function edit(Building $building)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\Building $building
     * @return CustomResponse
     */
    public function update(Building $building)
    {
        $attributes = $this->validateRequestForCreateOrUpdate();
        $building->update($attributes);

        return CustomResponse::createSuccess($building->toArray());
    }

    /**
     * Validate Request for create or update building
     * @return array $attributes
     */
    private function validateRequestForCreateOrUpdate()
    {
        return request()->validate([
            'name' => 'required|string|max:180',
            'city' => 'required|string|max:30|in:tehran,qeshem,bandar',
            'address' => 'required|string|max:180',
            'google_map_url'=>'required|string|max:180'
        ]);
    }


}
