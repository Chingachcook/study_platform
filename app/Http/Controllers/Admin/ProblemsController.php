<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Problem;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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

        return view('admin.problems.index', compact('problems'));
    }

    public function create()
    {
        return view('admin.problems.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);
        $problem = Problem::create($request->all());
        return redirect('admin/problems')->with('flash_message', 'Problem added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $problem = Problem::findOrFail($id);
        return view('admin.problems.show', compact('problem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $problem = Problem::findOrFail($id);
        return view('admin.problems.edit',compact('problem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['title' => 'required']);

        $problem = Problem::findOrFail($id);
        $problem->update($request->all());

        return redirect('admin/problems')->with('flash_message', 'updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Problem::destroy($id);

        return redirect('admin/problems')->with('flash_message', 'deleted!');
    }


}
