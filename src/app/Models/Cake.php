<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cake extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    public function getCakeInterests(){
        $data = $this->hasMany(CakeInterest::class);
        $data->where('status', 'pending');
        return $data;
    }

}
