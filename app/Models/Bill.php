<?php

namespace App\Models;


use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
/**
 * Class Bill
 * @package App\Models
 */
class Bill extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    use HasFactory;

    /**
     * Relationship
     */

    /**
     * Relation Between Bill And User Model
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creator(){
        return $this->hasOne(User::class, 'creator_id');
    }

    /**
     * Relation Between Bill And Category Model
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category(){
        return $this->hasOne(Category::class ,'cat_id' );
    }

    /**
     * Relation Between Bill And Building Model
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function building(){
        return $this->hasOne(Building::class, 'building_id');
    }

    /**
     * Relation Between Bill And Item Model
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function items(){
        return $this->hasMany(Item::class , 'item_id');
    }


}
