<?php

namespace App\Http\Controllers;

use App\project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $projects = project::where('owner_id',auth()->id())->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $projects = project::all();

        return view('projects.create');
    }

    public function store()
    {
       $attributes=request()->validate([
            'title'=>['required', 'min:3'],
            'description'=>['required', 'min:5']
        ]);

        $attributes['owner_id'] = auth()->id();

        Project::create($attributes);

        return redirect('/projects');
    }

     public function show(Project $project)
     {
        return view('projects.show', compact('project'));
     }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        request()->validate
        ([
            'title'=>['required', 'min:3'],
            'description'=>['required', 'min:5']
        ]);

        $project->update(request(['title', 'description']));

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
}
