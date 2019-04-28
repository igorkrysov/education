<?php

namespace App\Listeners;

use App\Events\AddNewWord;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EventWord;

class AddNewWordDBNotification
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
     * @param  AddNewWord  $event
     * @return void
     */
    public function handle(AddNewWord $event)
    {
        EventWord::addWordEvent($event->getDictionaryId());
        return true;        
    }
}
