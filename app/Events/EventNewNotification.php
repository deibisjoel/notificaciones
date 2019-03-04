<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EventNewNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mensaje ;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('messages-chanel');
    }

    public function broadcastWith()
    {
        
        return  [ 'data'=>'<li class="list-group-item">
                <a href="'.route("messages.show",$this->mensaje->id) .'">
                Notification enviada por el Usuario '. $this->mensaje->sender->name .'</a>
                <form action="'.route("notifications.update",$this->mensaje->id) .'" method="POST" class="float-right">
                   '.  csrf_field().'
                    '.  method_field("PUT").'
                    <button class="btn btn-danger">x</button>
                </form>
                </li>', 'user_id' => $this->mensaje->recipient_id];
        
    }
}
