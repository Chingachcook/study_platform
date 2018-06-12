<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Lessons;
use App\Question;
use App\TestsForUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Module;
use App\Permission;

class LessonsController extends Controller
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
            $lessons = Lesson::where('title', 'LIKE', "%$keyword%")->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $lessons = Lesson::paginate($perPage);
        }

        return view('admin.lessons.index', compact('lessons','module'));
    }

    public function create($id)
    {
        $id_example = $id;
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        return view('admin.lessons.create',compact('id_example'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $data = $request->all();
        $lesson = Lesson::create($data);

        $module = $data['module_id'];
        $mod = Module::find($module);
        $lessons = $mod->lessons_child;
        //return redirect('admin/lessons',compact('module'))->with('flash_message', 'Role added!');
        return view('admin.lessons.index',compact('module','lessons'));

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

        return view('admin.lessons.index2', compact('id'));
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
        $module_id = $lesson->module_id;
        return view('admin.lessons.edit',compact('lesson','module_id'));
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

        $lessons = Lesson::findOrFail($id);
        $lessons->update($request->all());
        $module = $lessons->module_id;
        $mod = Module::find($module);
        $lessons = $mod->lessons_child;

        return view('admin.lessons.index', compact('module','lessons'))->with('flash_message', 'Урок Обновлен!');
    }

    public function destroy($id)
    {
        Lesson::destroy($id);

        $lessons = Lesson::findOrFail($id);
        $module = $lessons->module_id;
        $mod = Module::find($module);
        $lessons = $mod->lessons_child;

        /*$questions = Question::where('lesson_id', $id)->get();

        if (isset($questions)) {
            foreach ($questions as $question) {
                $answers = $question->answer_child;
            }
        }

        if (isset($answers)) {
            foreach ($answers as $answer) {
                //Answer::destroy($answer->id);
                echo "<pre>";
                print_r($answer);
                echo "</pre>";
            }
        }*/


        /*echo "<pre>";
        print_r($questions);
        echo "</pre>";
        die();*/

        return view('admin.lessons',compact('module','lessons'))->with('flash_message', 'updated!');

        //return redirect('admin/lessons')->with('flash_message', 'Role deleted!');
    }




}
