<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {

            $project = new Project();
            $project->name = $request->name;
            $project->description = $request->description;
            $project->url = $request->url;
            $project->image = $request->image->store('assets/uploads/project');

            $project->save();
            return redirect()->back()->with('success', 'Project added successfully.');
        } else {
            $projects = Project::orderBy('created_at', 'DESC')->get();
            return view('admin.project.add',compact('projects'));
        }
    }
    public function edit(Request $request, $id){
        $project = Project::find($id);
        if($project){
            if($request->getMethod()=='POST'){
                $project->name = $request->name;
                $project->description = $request->description;
                $project->url = $request->url;
                if($request->hasFile('image')){
                    $project->image = $request->image->store('assets/uploads/project');
                }
                $project->save();
                return redirect()->back()->with('message','Project updated successfully.');
            }
        }
    }
    public function delete($id){
        $project = Project::find($id);
        if($project){
            $project->delete();
            return redirect()->back()->with('message','Project deleted successfully.');
        }
    }
}
