<?php

namespace App\Services;

use App\Models\CakeInterest;
use App\Mail\CakeAvailable;
use Illuminate\Support\Facades\Mail;

class CakeInterestService {

    public function create(array $data)
    {
        $interest = new CakeInterest;
        $interest->cake_id = $data['cake_id']; 
        $interest->email = $data['email'];
        $interest->status = $data['status'];
        $interest->save();
        return $interest;
    }

    public function sendAlertCakeInterest(CakeInterest $interest) {
        $interest->status = 'sended';
        $interest->save();

        Mail::to($interest->email)->send(new CakeAvailable($interest));
    }
    
}