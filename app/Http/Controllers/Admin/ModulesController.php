<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Document;
use App\Question;
use App\TestsForUser;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Lesson;

class ModulesController extends Controller
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
            $modules = Module::where('title', 'LIKE', "%$keyword%")->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $modules = Module::paginate($perPage);
        }

        return view('admin.modules.index', compact('modules'));
    }

    public function create()
    {
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        return view('admin.modules.create');
    }

    public function getLessons()
    {
        $mod = Module::all();
        dump($mod);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $module = Module::create($request->all());
        //$module->permissions()->detach();

        //if ($request->has('permissions')) {
         //   foreach ($request->permissions as $permission_name) {
               // $permission = Permission::whereName($permission_name)->first();
                //$module->givePermissionTo($permission);

        return redirect('admin/modules')->with('flash_message', 'Модуль Добавлен!');
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
        //$module = Module::findOrFail($id);
        //$lesson = Lesson::findOrFail(1);

        //return view('admin.lessons.show', compact('lesson'));
        $keyword = null;
        //$keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $lessons = Lesson::where('title', 'LIKE', "%$keyword%")->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $lessons = Lesson::paginate($perPage);
        }

        $module = $id;
        $mod = Module::find($id);
        $lessons = $mod->lessons_child;

        return view('admin.lessons.index', compact('lessons','module'));

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
        $module = Module::findOrFail($id);
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        return view('admin.modules.edit',compact('module'));
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

        $module = Module::findOrFail($id);
        $module->update($request->all());

        return redirect('admin/modules')->with('flash_message', 'Модуль Обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id_module)
    {
        Module::destroy($id_module);

        return redirect('admin/modules')->with('flash_message', 'Модуль Удален!');
    }


}
