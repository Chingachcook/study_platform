<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use App\Video;

class VideosController extends Controller
{

    public function index(Request $request)
    {
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
        $less = Lesson::find($id);
        $videos = $less->videos_child;
        //$video = $videos[0];

        return view('admin.videos.index', compact('videos','id'));
    }

    public function create($id)
    {
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        return view('admin.videos.create',compact('id'));
    }

    public function store(Request $request)
    {
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
        $this->validate($request, ['title' => 'required']);

        $video = Video::findOrFail($id);
        $video->update($request->all());

        $id = $video->lesson_id ;

        $less = Lesson::find($id);
        $videos = $less->videos_child;


        return view('admin.videos.index',compact('videos','id'))->with('flash_message', 'updated!');

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
        $video = Video::findOrFail($id_video);
        Video::destroy($id_video);
        $id = $video->lesson_id ;
        $less = Lesson::find($id);
        $videos = $less->videos_child;

        return view('admin.videos.index',compact('videos','id'))->with('flash_message', 'updated!');

        //return redirect('admin/videos')->with('flash_message', 'Role deleted!');
    }

    //Для User
    public function video_for_user($id)
    {
        $less = Lesson::find($id);
        $videos = $less->videos_child;
        $video = $videos[0];
        return view('video', compact("video"));
    }
}
