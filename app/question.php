<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    //
    public function questionType() 
    {
        return $this->belongsTo('App\question_type', 'question_type');
    }
}
