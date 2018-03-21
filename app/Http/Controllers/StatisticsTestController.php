<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsTestController extends Controller
{
    public function index()
    {
        return view("statistics_test");
    }

}
