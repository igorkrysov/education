<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    //
    protected $fillable = ['title'];

    public function words() {
        return $this->hasMany('App\Word');
    }
}
