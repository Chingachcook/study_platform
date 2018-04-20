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
    public function index()
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
}
