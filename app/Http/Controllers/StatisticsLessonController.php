<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsLessonController extends Controller
{
    public function index()
    {
        return view("statistics_lesson");
    }

}
