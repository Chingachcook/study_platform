<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\TestsForUser;
use Illuminate\Http\Request;
use App\Module;
use App\User;


class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {

        $modules = Module::all();
        return view('admin.statistics.index', compact('modules'));
    }

    public function lessons_list_stat_admin($id)
    {
        $mod = Module::find($id);
        $lessons = $mod->lessons_child;
        return view('admin.statistics.lesson_list_stat', compact('lessons'));
    }

    public function lesson_stat_admin($id)
    {
        //$results = TestsForUser::all()->where('test_admin_id', $id);

        $results = \DB::table("tests_for_users")->where('test_admin_id', $id)
            ->join('users', 'tests_for_users.user_id', '=', 'users.id')
            ->select('users.name','tests_for_users.result')
            ->get();

        //dump($results);
        return view('admin.statistics.lesson_stat_admin', compact('results','id'));
    }


    public function statistics_modules($id)
    {
        $modules = Module::all();
        return view('admin.statistics.modules', compact('modules','id'));
    }

    public function statistics_lessons($id,$id_user)
    {
        $mod = Module::find($id);
        $lessons = $mod->lessons_child;
        return view('admin.statistics.lessons', compact('lessons','id_user'));
    }

    public function statistics_lesson_user($id,$id_user)
    {

        $user = User::find($id_user);
        $results = $user->result_child->where('test_admin_id', $id);
        $i=1;
        return view('admin.statistics.stat_user_lesson', compact('results','id_lesson','i'));
    }

}
