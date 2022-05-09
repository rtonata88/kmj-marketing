<?php

namespace App\Listeners;

use App\Events\CreateInvestor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateInvestorListener
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
     * @param  \App\Events\CreateInvestor  $event
     * @return void
     */
    public function handle(CreateInvestor $event)
    {
        //
    }
}
