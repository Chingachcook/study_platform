<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use App\Lesson;

class DocumentsController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $documents = Document::where('title', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $documents = Document::paginate($perPage);
        }

        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        $module_id = 1;
        return view('admin.documents.create',compact('module_id'));
    }


    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);


        $docName = $request->file('docx')->getClientOriginalName();
        $path = base_path() . '/resources/assets/documents/';
        $request->file('docx')->move(
            $path, $docName
        );

        $data = $request->all();
        $data['document_path'] = $path . $docName;
        $document = Document::create($data);

        return redirect('admin/documents')->with('flash_message', 'Role added!');
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
        $document = Document::findOrFail($id);

        return view('admin.documents.index2');
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
        $document = Document::findOrFail($id);
        //$permissions = Permission::select('id', 'title', 'description')->get()->pluck('description', 'title');

        return view('admin.documents.edit');
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

        $document = Document::findOrFail($id);
        $document->update($request->all());
        $document->permissions()->detach();

        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_name) {
                $permission = Permission::whereName($permission_name)->first();
                $document->givePermissionTo($permission);
            }
        }

        return redirect('admin/documents')->with('flash_message', 'Role updated!');
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
        Document::destroy($id);

        return redirect('admin/documents')->with('flash_message', 'Role deleted!');
    }

    //Для User
    public function docx_for_user($id)
    {
        $less = Lesson::find($id);
        $documents = $less->docx_child;
        $document = $documents[0]->document_path;
        return view('document', compact("document"));
    }

}
