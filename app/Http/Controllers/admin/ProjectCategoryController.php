<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProjectCategory;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project_cats = ProjectCategory::where('is_active','1')->get();
        $title = 'Delete Project Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.project-category.index',compact('project_cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $project_cat =new ProjectCategory;
        $project_cat->name = $request->name;
        $project_cat->is_active = $request->is_active;
        $project_cat->save();
        return redirect()->route('project-category.index');
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
        $project_cat =ProjectCategory::findOrFail($id);
        return view('admin.project-category.edit',compact('project_cat'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $project_cat =ProjectCategory::findOrFail($id);
        $project_cat->name = $request->name;
        $project_cat->is_active = $request->is_active;
        $project_cat->save();
        return redirect()->route('project-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project_cat =ProjectCategory::findOrFail($id);
        $project_cat->delete();
        return redirect()->route('project-category.index');
    }
}
