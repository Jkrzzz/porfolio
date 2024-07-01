<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Models\Admin\ProjectItem;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProjectCategory;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('is_active','1')->get();
        return view('admin.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project_items = ProjectItem::all();
        $project_cats = ProjectCategory::all();
        return view('admin.project.create',compact('project_items','project_cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->link = $request->link;
        $project->is_active = $request->is_active;
        if(isset($request->poster_base64)) {
            $image = $this->storeBase64($request->poster_base64,$request->file('project_image'));
        }else {
            $image = Null;
        }
        $project->img = $image;
        $project->save();
        if ($request->has('project_items')) {
            $project->items()->sync($request->project_items);
        }

        if ($request->has('project_cats')) {
            $project->categories()->sync($request->project_cats);
        }
        return redirect()->route('project.index');
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
        $project_items = ProjectItem::all();
        $project_cats = ProjectCategory::all();
        $project = Project::findOrFail($id);
        return view('admin.project.edit',compact('project_items','project_cats','project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project =Project::findOrFail($id);
        $project->name = $request->name;
        $project->link = $request->link;
        $project->is_active = $request->is_active;
        if(isset($request->poster_base64)) {
            $image = $this->storeBase64($request->poster_base64,$request->file('project_image'));
        }else {
            $image = $project->img;
        }
        $project->img = $image;
        $project->save();
        if($request->has('project_items')) {
            $project->items()->sync($request->project_items);
        }
        
        if($request->has('project_cats')) {
            $project->categories()->sync($request->project_cats);
        }
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project =Project::findOrFail($id);
        $project->delete();
        return redirect()->route('project.index');
    }
    private function storeBase64($imageBase64,$fileName) 
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $extension = $fileName->getClientOriginalExtension();
        $imageName = uniqid() . '_' . time() . '.' . $extension;


        $path = public_path('storage/project/img/');

        !file_exists($path) && mkdir($path, 0777, true);

        $success = file_put_contents($path .$imageName, $imageBase64);

        return $imageName;
    }
    public function getProjects()
    {
        $projects = Project::with(['items', 'categories'])->paginate(6); 
        $formatted_projects = $projects->getCollection()->map(function($project) {
            return [
                'id' => $project->id,
                'name' => $project->name,
                'image_location' => asset('storage/project/img/' . $project->img),
                'link' => $project->link,
                'items' => $project->items,
                'categories' => $project->categories,
            ];
        });
    
        return response()->json([
            'data' => $formatted_projects,
            'meta' => [
                'current_page' => $projects->currentPage(),
                'last_page' => $projects->lastPage(),
                'per_page' => $projects->perPage(),
                'total' => $projects->total(),
            ]
        ]);
    }
}
