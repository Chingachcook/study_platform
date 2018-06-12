<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = ['id','title', 'code','description','created_at','updated_at'];
}
