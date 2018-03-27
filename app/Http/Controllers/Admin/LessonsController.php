<?php

namespace App\Http\Controllers\Admin;

use App\Lessons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Permission;

class LessonsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $lessons = Lesson::where('title', 'LIKE', "%$keyword%")->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $lessons = Lesson::paginate($perPage);
        }

        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        $module_id = 1;
        return view('admin.lessons.create',compact('module_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $lesson = Lesson::create($request->all());
        //$module->permissions()->detach();

        //if ($request->has('permissions')) {
        //   foreach ($request->permissions as $permission_name) {
        // $permission = Permission::whereName($permission_name)->first();
        //$module->givePermissionTo($permission);

        return redirect('admin/lessons')->with('flash_message', 'Role added!');
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
        $lesson = Lesson::findOrFail($id);

        return view('admin.lessons.index2');
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
        $lesson = Lesson::findOrFail($id);
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        return view('admin.lesson.edit');
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

        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->all());
        $lesson->permissions()->detach();

        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_name) {
                $permission = Permission::whereName($permission_name)->first();
                $lesson->givePermissionTo($permission);
            }
        }

        return redirect('admin/lessons')->with('flash_message', 'Role updated!');
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
        Role::destroy($id);

        return redirect('admin/lessons')->with('flash_message', 'Role deleted!');
    }
}
