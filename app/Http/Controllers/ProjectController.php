<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
//use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $projects = auth()->user()->projects;
        
        return view('projects.index',compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $data['user_id'] = auth()->id();
        Project::create($data);
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        return view('projects.show' , compact('project'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $project->update([
            'status' => request('status')
        ]);
        
       $project->save();

       return redirect('/projects/'.$project->id);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
}
