<?php

namespace App\Models;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $guarded = [];
    protected $hidden = ['created_at' , 'updated_at'];
    /**
     * Relation Between Category And Bill Model
     * @return hasMany
     */
    public function bill(){
        return $this->hasMany(Bill::class);
    }
}
