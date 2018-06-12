<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Lesson;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Для User
    public function lessons_list_for_user($id)
    {
        $mod = Module::find($id);
        $lessons = $mod->lessons_child;
        $i = 1;
        return view('lessons_list', compact('lessons','i'));
    }

    public function lesson_for_user($id)
    {
        $lesson = Lesson::find($id);
        $i = 1;
        return view('lesson', compact('lesson','i'));
    }
}
