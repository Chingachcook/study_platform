<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Problem;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $problems = Problem::where('title', 'LIKE', "%$keyword%")->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")->paginate($perPage);
        } else {
            $problems = Problem::paginate($perPage);
        }

        return view('problems', compact('problems'));
    }

    public function show($id)
    {
        $problem = Problem::findOrFail($id);
        return view('problems_search', compact('problem'));
    }
}
