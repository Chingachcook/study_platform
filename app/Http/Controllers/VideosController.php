<?php

namespace App\Http\Controllers;

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

    public function create()
    {
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        $module_id = 1;
        return view('admin.videos.create',compact('module_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);
        $document = Video::create($request->all());

        return redirect('admin/videos')->with('flash_message', 'Video added!');
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

        return view('admin.videos.edit');
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
        $video->permissions()->detach();

        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_name) {
                $permission = Permission::whereName($permission_name)->first();
                $video->givePermissionTo($permission);
            }
        }

        return redirect('admin/videos')->with('flash_message', 'Role updated!');
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
        Video::destroy($id);

        return redirect('admin/videos')->with('flash_message', 'Role deleted!');
    }
}
