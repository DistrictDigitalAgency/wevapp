<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function questions()
    {
        return $this -> belongsTo('App\Category');
    }


    public function questions_vote()
    {
        return $this->hasMany('App\Votes');

    }
}
