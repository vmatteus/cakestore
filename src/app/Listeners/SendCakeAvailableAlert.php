<?php

namespace App\Listeners;

use App\Jobs\JobSendCakeAvailableAlert;

class SendCakeAvailableAlert
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $data = $event->cake->getCakeInterests;

        $data->each(function ($interest, $key) {
            dispatch((new JobSendCakeAvailableAlert($interest))->onQueue('default'));
        });
    }
}
