<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Skill;
use Illuminate\Http\Request;
use App\Models\Admin\SkillItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'skill_item' =>'required|array|min:1',
            'skill_level' =>'required|array|min:1',
        ]);
        $skill = new Skill();
        $skill->name = $request->name;

        $skill->save();
        $skill_level = $request->skill_level;
        foreach ($request->skill_item as $key => $item) {
            $skill_item = new SkillItem();
            $skill_item->skill_item_name = $item;
            $skill_item->skill_level_name = $skill_level[$key];
            $skill_item->skill_id = $skill->id;
            $skill_item->save();
        }
        return redirect()->route('skill.index');
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
        $skill = Skill::findOrFail($id);
        return view('admin.skill.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'skill_item' =>'required|array|min:1',
            'skill_level' =>'required|array|min:1',
        ]);
        $skill = Skill::findOrFail($id);
        $skill->name = $request->name;

        $skill->save();
        $skill_level = $request->skill_level;

        if ($skill) {
            $skill->skillItem()->delete();
        }
        foreach ($request->skill_item as $key => $item) {
            $skill_item = new SkillItem();
            $skill_item->skill_item_name = $item;
            $skill_item->skill_level_name = $skill_level[$key];
            $skill_item->skill_id = $skill->id;
            $skill_item->save();
        }
        return redirect()->route('skill.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $skill = Skill::findOrFail($id);
            $skill->skillItem()->delete();
            $skill->delete();
            return redirect()->back()->with('success', 'Skill and related items deleted successfully.');
    }
    public function getSkill(){
        $skills = Skill::with('skillItem')->get();
        $formattedSkills = $skills->map(function($skill){
            return [
                'category' =>$skill->name,
                'skill_items' =>$skill->skillItem->map(function($item){
                    return [
                        'name' => $item->skill_item_name,
                        'level' => $item->skill_level_name,
                    ];
                }),
            ];
        });
        return response()->json($formattedSkills);
    }
}
