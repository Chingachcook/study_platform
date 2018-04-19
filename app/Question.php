<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['id','title', 'lesson_id','created_at','updated_at'];

    public function answer_child()
    {
        return $this->hasMany('App\Answer');
    }
}
