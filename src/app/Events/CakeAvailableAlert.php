<?php

namespace App\Events;

use App\Models\Cake;
use Illuminate\Queue\SerializesModels;

class CakeAvailableAlert
{
    use SerializesModels;

    public $cake;
    
    public function __construct(Cake $cake)
    {
        $this->cake = $cake;
    }
}