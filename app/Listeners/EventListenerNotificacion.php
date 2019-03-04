<?php

namespace App\Listeners;

use App\Events\EventNewNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventListenerNotificacion
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
     * @param  EventNewNotification  $event
     * @return void
     */
    public function handle(EventNewNotification $event)
    {
        //
    }
}
