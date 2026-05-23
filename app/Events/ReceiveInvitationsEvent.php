<?php

namespace App\Events;

use App\Classes\HashGenerator;
use App\Models\Room;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReceiveInvitationsEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $user;
    public $room;

    public function __construct($user, $room)
    {
        $hashids = new HashGenerator();
        $this->user = User::find($hashids->decode($user))->first();
        $this->room = Room::find($hashids->decode($room))->load('createdBy')->first();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("receive-invitations.{$this->user->id}");
    }

    public function broadcastAs()
    {
        return 'receive-invitations-event';
    }

    // public function broadcastWith()
    // {
    //     return [$this->user, $this->room];
    // }
}
