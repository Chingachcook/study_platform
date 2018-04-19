<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestsForUser extends Model
{
    protected $fillable = ['id', 'test_admin_id','result','user_id','created_at','created_at'];


}
