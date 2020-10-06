<?php

namespace App\Http\Controllers;

use App\Helpers\CustomResponse;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Rules\ItemChecker;
use Illuminate\Http\Response;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return CustomResponse::createSuccess(Bill::all()->take(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return CustomResponse
     */
    public function store()
    {
        $attributes   = $this->validateRequestForCreate();
        $bill = Bill::create($attributes);
        return CustomResponse::createSuccess(['bill_id'=>$bill->id , 'items' => $bill->items->map(function ($item) {
            return collect($item->toArray())
                ->only(['id']);
            })
]);
    }

    /**
     * Display the specified resource.
     *
     * @param Bill $bill
     * @return CustomResponse
     */
    public function show(Bill $bill)
    {
        return CustomResponse::createSuccess($bill->getData());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bill $bill
     * @return Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Bill $bill
     * @return void
     */
    public function update(Bill $bill)
    {
        $attributes  = $this->validateRequestForUpdate();
        $bill->update($attributes);
        return CustomResponse::createSuccess($bill->getData());
    }

    /**
     * Validate Request for create
     * @return array $attributes
     */
    private function validateRequestForCreate()
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:180',
            'description' => 'required|string|max:180',
            'price' => 'required|integer|max:9223372036854775807',
            'image_url'=>'required|string|max:180',
            'building_id'=>'required|integer|max:9223372036854775807|exists:buildings,id',
            'category_id'=>'required|integer|max:9223372036854775807|exists:categories,id',
            'items' => ['required' ,new ItemChecker],
        ]);
        $attributes['creator_id'] = request()->user()->id;

        return $attributes;
    }

    /**
     * validate Request For Update Existence Bill Model
     */
    private function validateRequestForUpdate(){
        return request()->validate([
            'name' => 'required|string|max:180',
            'description' => 'required|string|max:180',
            'price' => 'required|integer|max:9223372036854775807',
            'image_url'=>'required|string|max:180',
            'building_id'=>'required|integer|max:9223372036854775807|exists:buildings,id',
            'category_id'=>'required|integer|max:9223372036854775807|exists:categories,id',
        ]);

    }
}
