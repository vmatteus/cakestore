<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CakeInterest extends Model
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
        'email',
    ];

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }
    
}
