<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonListController extends Controller
{
    public function index()
    {
        return view("lessons_list");
    }

}
