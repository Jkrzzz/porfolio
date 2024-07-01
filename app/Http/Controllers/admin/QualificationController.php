<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Qualification;
use App\Http\Controllers\Controller;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualifications = Qualification::all();
        return view('admin.qualification.index',compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.qualification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $qualification =new Qualification();
        $qualification->name = $request->name;
        $qualification->position = $request->position;
        $qualification->type = $request->type;
        $qualification->start_date = $request->start_date;
        $qualification->end_date = $request->end_date;
        $qualification->save();
        return redirect()->route('qualification.index');
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
        $qualification = Qualification::findOrFail($id);
        return view('admin.qualification.edit',compact('qualification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $qualification =Qualification::findOrFail($id);
        $qualification->name = $request->name;
        $qualification->position = $request->position;
        $qualification->type = $request->type;
        $qualification->start_date = $request->start_date;
        $qualification->end_date = $request->end_date;
        $qualification->save();
        return redirect()->route('qualification.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qualification =Qualification::findOrFail($id);
        $qualification->delete();
        return redirect()->route('qualification.index');
    }

    public function getQualification() {
        $qualifications = Qualification::all();
    
        $educations = [];
        $experiences = [];
    
        foreach ($qualifications as $qualification) {
            $startDate = date('Y', strtotime($qualification->start_date));
            $endDate = $qualification->end_date ? date('Y', strtotime($qualification->end_date)) : 'Present';

            $data = [
                'title' => $qualification->name,
                'subtitle' => $qualification->position,
                'period' => $startDate . ' - ' . ($endDate ?? 'Present')
            ];
    
            if ($qualification->type === 'Education') {
                $educations[] = $data;
            } elseif ($qualification->type === 'Experience') {
                $experiences[] = $data;
            }
        }
    
        $formattedData = [
            'educations' => $educations,
            'experiences' => $experiences
        ];
    
        return response()->json($formattedData);
    }
}
