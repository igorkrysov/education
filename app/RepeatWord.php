<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\RepeatWord;
class RepeatWord extends Model
{
    //
    protected $table = "repeat_word";
    protected $fillable = ['word_id'];
    public $timestamps = false;

    public function word() {
        return $this->belongsTo('App\Word');
    }
}
