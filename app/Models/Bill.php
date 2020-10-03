<?php

namespace App\Models;


use App\Models\Building;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    protected $hidden = ['updated_at' , ];
    use HasFactory;

    /**
     * Create New Bill Model
     * @param array $attributes
     * @return Builder|Model
     */
    public static function create(array $attributes = [])
    {

       $bill_for_create_db_model = [
           'name' => $attributes['name'],
           'description' => $attributes['description'],
           'price' => $attributes['price'],
           'image_url' => $attributes['image_url'],
           'building_id' => $attributes['building_id'],
           'category_id' => $attributes['category_id'],
           'creator_id' => $attributes['creator_id']
       ];
        $bill = static::query()->create($bill_for_create_db_model);
        $bill->items()->createMany($attributes['items']);
        return $bill;
    }
    /**
     * Relationship
     */

    /**
     * Relation Between Bill And User Model
     * @return belongsTo
     */
    public function creator(){
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Relation Between Bill And Category Model
     * @return belongsTo
     */
    public function category(){
        return $this->belongsTo(Category::class  , 'category_id' );
    }

    /**
     * Relation Between Bill And Building Model
     * @return belongsTo
     */
    public function building(){
        return $this->belongsTo(Building::class  , 'building_id');
    }

    /**
     * Relation Between Bill And Item Model
     * @return HasMany
     */
    public function items(){
        return $this->hasMany(Item::class , 'bill_id' , );
    }

    /**
     * Create Data of Model
     * @return array
     */
    public function getData() {

        $bill = $this->toArray();
        $bill['items'] = $this->items->toArray();
        $bill['category'] = $this->category->toArray();
        $bill['creator'] = $this->creator->toArray();
        unset($bill['building_id']);
        unset($bill['category_id']);
        unset($bill['creator_id']);
        return $bill;
    }


}
