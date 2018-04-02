<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['id','title', 'description','module_id'];

    public function tests_child()
    {
        return $this->hasMany('App\Test');
    }


    public function videos_child()
    {
        return $this->hasMany('App\Video');
    }

    public function docx_child()
    {
        return $this->hasMany('App\Document');
    }

}
