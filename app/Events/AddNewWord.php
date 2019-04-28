<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AddNewWord
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $dictionaryId = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($dictionaryId)
    {
        $this->dictionaryId = $dictionaryId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function getDictionaryId() {
        return $this->dictionaryId;
    }
}
