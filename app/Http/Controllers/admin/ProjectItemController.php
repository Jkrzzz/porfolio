<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Admin\ProjectItem;
use App\Http\Controllers\Controller;

class ProjectItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $project_items = ProjectItem::all();
        $title = 'Delete Project Item!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.project-item.index',compact('project_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project-item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $project_item =new ProjectItem;
        $project_item->name = $request->name;
        $project_item->color = $request->color;
        $project_item->save();
        return redirect()->route('project-item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project_item = ProjectItem::findOrFail($id);
        return view('admin.project-item.edit',compact('project_item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $project_item = ProjectItem::findOrFail($id);
        $project_item->name = $request->name;
        $project_item->color = $request->color;
        $project_item->save();
        return redirect()->route('project-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
