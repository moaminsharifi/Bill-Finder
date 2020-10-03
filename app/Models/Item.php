<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $guarded = [];
    protected $hidden = ['created_at' , 'updated_at'];

    /**
     * Relation Between Item And Bill Model
     * @return belongsTo
     */
    public function bill(){
        return $this->belongsTo(Bill::class);
    }
}
