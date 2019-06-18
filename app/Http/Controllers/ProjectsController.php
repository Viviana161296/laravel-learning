<?php

namespace App\Http\Controllers;

use App\project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){

        $projects = project::all();


        return view('projects.index', compact('projects'));
    }

    public function create(){

                $projects = project::all();


                return view('projects.create');
            }

    public function store(){

            request()->validate([
                'title'=>['required', 'min:3'],
                'description'=>['required', 'min:6']
            ]);
                       // return request()->all();
            $project=new project();
            $project->title= request('title');
            $project->description=request('description');

            $project->save();
            return redirect('/projects');
                    }
     public function show($id){
        $project=project::findOrFail($id);
        return $project;
         return view('projects.show', compact('project'));
         }
      public function edit($id)
      {
          $project=project::findOrFail($id);

          return view('projects.edit', compact('project'));
      }
      public function update($id)
      {
         $project=project::findOrFail($id);

         $project->Title=request('title');
         $project->Description=request('description');

        $project->save();

        return redirect('/projects');
      }

      public function destroy($id)
      {
          Project::findOrFail($id)->delete();
          return redirect('/projects');
        }
}
