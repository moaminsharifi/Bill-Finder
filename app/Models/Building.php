<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bill(){
        return $this->belongsTo(Bill::class );
    }
}
