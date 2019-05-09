<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function questions()
    {
        return $this -> hasMany('App\Question');
    }
}
