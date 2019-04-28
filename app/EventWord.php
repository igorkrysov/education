<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventWord extends Model
{
    protected $primaryKey = "dictionary_id";
    public $incrementing = false;
    public $timestamps = false;
    //
    public static function addWordEvent($dictionaryId) {
        $event = self::find($dictionaryId);
        if ($event) {
            $event->count++;
            $event->save();
        } else {
            $event = new self();
            $event->count = 1;
            $event->dictionary_id = $dictionaryId;
            $event->save();
        }
    }
}
