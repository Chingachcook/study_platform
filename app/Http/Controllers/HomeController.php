<?php

namespace App\Http\Controllers;

use App\Problem;
use Illuminate\Http\Request;
use App\Module;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        $i = 1;
        return view('home2', compact('modules','i'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        $problems = Problem::where('code', 'LIKE', "%$keyword%")->orWhere('title', 'LIKE', "%$keyword%")->paginate(15);;
        foreach ($problems as $item)
        {
            dump($item->title);

        }
    }
}
