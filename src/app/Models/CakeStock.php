<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CakeStock extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cake_id',
        'status',
        'weight',
        'price'
    ];

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }
    
}
