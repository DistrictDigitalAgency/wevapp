<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $fillable = [
        'userID', 'questionID', 'answerVotedFor'
    ];


    public function questions_vote()
    {
        return $this -> belongsTo('App\Question');
    }

    public function user_vote()
    {
        return $this -> belongsTo('App\WivoUsers');
    }
}
