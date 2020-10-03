<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Building extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];
    protected $hidden = ['created_at' , 'updated_at'];


    /**
     * Relation Between Building And Bill Model
     * @return hasMany
     */
    public function bill(){
        return $this->hasMany(Bill::class);
    }
}
