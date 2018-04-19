<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\TestsForUser;
use App\User;
use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Module;
use App\Answer;
use App\Questions_Answers;
use Illuminate\Support\Facades\Auth;

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

    public function index2($id)
    {
        $less = Lesson::find($id);
        $tests = $less->questions_child;

        return view('admin.tests.index', compact('tests','id'));
    }

    public function create($id)
    {
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');


        return view('admin.tests.create',compact('id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);
        /*
        $testName = $request->file('test')->getClientOriginalName();
        $path = base_path() . '/resources/assets/tests/';
        $request->file('test')->move(
            $path, $testName
        );

        $data['test_path'] = $path . $testName;
        $document = Test::create($data);
      */
        $data = $request->all();
        $post = new Question;
        $post->title = $data['title'];
        $post->lesson_id = $data['lesson_id'];
        $post->save();

        $id_q = Question::all()->last()->id;

        $post = new Answer;
        $post->title = $data['answer1'];
        if ($data['right']=='1') $post->right = true;
        $post->question_id = $id_q;
        $post->save();
        $post = new Answer;
        $post->title = $data['answer2'];
        if ($data['right']=='2') $post->right = true;
        $post->question_id = $id_q;
        $post->save();
        $post = new Answer;
        $post->title = $data['answer3'];
        if ($data['right']=='3') $post->right = true;
        $post->question_id = $id_q;
        $post->save();
        $post = new Answer;
        $post->title = $data['answer4'];
        if ($data['right']=='4') $post->right = true;
        $post->question_id = $id_q;
        $post->save();

        //return redirect('admin/tests')->with('flash_message', 'Test added!');
        $id = $data['lesson_id'];
        $less = Lesson::find($id);
        $tests = $less->questions_child;

        return view('admin.tests.index', compact('tests','id'));

        //return redirect('admin/lessons',compact('module'))->with('flash_message', 'Role added!');
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


    //Для User
    public function test_for_user($id)
    {
        $less = Lesson::find($id);
        $tests = $less->questions_child;

        $j = 1;

        return view('test', compact('tests','j','id'));
    }

    public function result($id)
    {
        $less = Lesson::find($id);
        $tests = $less->questions_child;
        $module_id = $less->module_id;;
        $res = 0;
        if (isset($_POST["submit"]))
        {
            foreach ($tests as $item)
        {
            if($_POST[$item->id]=='1')   $res++;
        }
        }
        $ok = ($res*100)/count($tests);
        $id_user = Auth::id();
        $post = new TestsForUser;
        $post->test_admin_id = $id;
        $post->module_id_test = $module_id;
        $post->result = $ok;
        $post->user_id = $id_user;
        $post->save();
    }

    public function statistics_module($id_module)
    {
        $id = Auth::id();
        $user = User::find($id);
        $results = $user->result_child;
        return view('statistics_test', compact('results','id_module'));
    }

    public function statistics()
    {
        $modules = Module::all();
        return view('statistics', compact('modules'));
    }

    public function test_txt($id)
    {
        $less = Lesson::find($id);
        $tests = $less->tests_child;
        $path = $tests[0]->test_path;

        //$content=file_get_contents($test);
        $t = file_get_contents($path);
        $str = iconv('windows-1251',"UTF-8//IGNORE",$t);
        $i = 0;
        $q_arr = array();
        $answr_arr = array();
        $right_answr_arr = array();

        $descriptor = fopen($path, 'r');
        if ($descriptor) {
            while (($string = fgets($descriptor)) !== false) {
                if ($i%5==0) {$q_arr[] = iconv('windows-1251',"UTF-8//IGNORE",$string);}
                if ($i%5==1) {$right_answr_arr[] = iconv('windows-1251',"UTF-8//IGNORE",$string);}
                if ($i%5!=0 && $i%5!=1) {$answr_arr[] = iconv('windows-1251',"UTF-8//IGNORE",$string);}
                $i++;
            }
            fclose($descriptor);

        } else {
            echo 'Невозможно открыть указанный файл';
        }

        dump($q_arr);
        dump($answr_arr);
        dump($right_answr_arr);
        //$less = Lesson::find($id);
        //$tests = $less->tests_child;

        return view('test', compact('q_arr','answr_arr','right_answr_arr'));
    }
}
