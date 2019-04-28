<?php

namespace App\Listeners;

use App\Events\AddNewWord;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddNewWordConsoleNotification
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
        //
        $dictionaryId = $event->getDictionaryId();
        \Log::info("User add word to $dictionaryId dictionary!");
    }
}
