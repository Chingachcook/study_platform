<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use App\Video;

class VideosController extends Controller
{
    public function index(Request $request)
    {
        $this->middleware('auth:admin');

        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $videos = Video::where('title', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $videos = Video::paginate($perPage);
        }

        return view('admin.videos.index', compact('videos'));
    }

    public function index2($id)
    {
        $this->middleware('auth:admin');

        $less = Lesson::find($id);
        $videos = $less->videos_child;
        //$video = $videos[0];

        return view('admin.videos.index', compact('videos','id'));
    }

    public function create($id)
    {
        $this->middleware('auth:admin');

        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        return view('admin.videos.create',compact('id'));
    }

    public function store(Request $request)
    {
        $this->middleware('auth:admin');

        $this->validate($request, ['title' => 'required']);
        $data = $request->all();
        Video::create($data);

        $id = $data['lesson_id'];

        $less = Lesson::find($id);
        $videos = $less->videos_child;

        return view('admin.videos.index',compact('videos','id'))->with('flash_message', 'updated!');

        //return redirect('admin/videos')->with('flash_message', 'Video added!');
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
        $this->middleware('auth:admin');

        $video = Video::findOrFail($id);

        return view('admin.videos.index2');
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
        $this->middleware('auth:admin');

        $video = Video::findOrFail($id);
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');
        $id = $video->lesson_id ;
        return view('admin.videos.edit',compact('video','id'));
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
        $this->middleware('auth:admin');

        $this->validate($request, ['title' => 'required']);

        $video = Video::findOrFail($id);
        $video->update($request->all());

        $id = $video->lesson_id ;

        $less = Lesson::find($id);
        $videos = $less->videos_child;


        return view('admin.videos.index',compact('videos','id'))->with('flash_message', 'Видео Обновлено!');

        //return redirect('admin/videos')->with('flash_message', 'Role updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id_video)
    {
        $this->middleware('auth:admin');

        $video = Video::findOrFail($id_video);
        Video::destroy($id_video);
        $id = $video->lesson_id ;
        $less = Lesson::find($id);
        $videos = $less->videos_child;

        return view('admin.videos.index',compact('videos','id'))->with('flash_message', 'Видео Удалено!');

        //return redirect('admin/videos')->with('flash_message', 'Role deleted!');
    }

    //Для User
    public function video_for_user($id)
    {
        $this->middleware('auth');

        $less = Lesson::find($id);
        $videos = $less->videos_child;

        if (isset($videos[0]->video_path)) {
            $video = $videos[0];
        } else {
            $video = NULL;
            $lesson_path = $id;
        }

        return view('video', compact("video", "lesson_path"));
    }
}
