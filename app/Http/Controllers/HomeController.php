<?php

namespace App\Http\Controllers;

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
        $posts = Post::where('name', $request->keywords)->get();

        return response()->json($posts);
    }
}
