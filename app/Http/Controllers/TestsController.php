<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestsController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $tests = Test::where('title', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $tests = Test::paginate($perPage);
        }

        return view('admin.tests.index', compact('tests'));
    }

    public function create()
    {
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        $module_id = 1;
        return view('admin.tests.create',compact('module_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $test = Test::create($request->all());
        //$module->permissions()->detach();

        //if ($request->has('permissions')) {
        //   foreach ($request->permissions as $permission_name) {
        // $permission = Permission::whereName($permission_name)->first();
        //$module->givePermissionTo($permission);

        return redirect('admin/tests')->with('flash_message', 'Role added!');
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
        $test = Test::findOrFail($id);

        return view('admin.tests.index2');
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
        $test = Test::findOrFail($id);
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        return view('admin.tests.edit');
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

        $test = Test::findOrFail($id);
        $test->update($request->all());
        $test->permissions()->detach();

        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_name) {
                $permission = Permission::whereName($permission_name)->first();
                $test->givePermissionTo($permission);
            }
        }

        return redirect('admin/tests')->with('flash_message', 'Role updated!');
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
        Test::destroy($id);

        return redirect('admin/tests')->with('flash_message', 'Role deleted!');
    }
}
