<?php

namespace App\Jobs;

use App;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\CakeInterest;
use App\Services\CakeInterestService;

class JobSendCakeAvailableAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $interest;

    /**
     * Create a new job instance.
     *
     * @param  Podcast  $podcast
     * @return void
     */
    public function __construct(CakeInterest $interest)
    {
        $this->interest = $interest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return App::make(CakeInterestService::class)->sendAlertCakeInterest($this->interest);
    }

}