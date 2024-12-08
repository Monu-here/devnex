<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function category(Request $request)
    {
        try {
            if ($request->getMethod() == 'POST') {
                $category = new ProjectCategory();
                $category->name = $request->name;
                $category->save();
                return redirect()->back()->with('message', 'Category added successfully.');
            } else {
                $categories = ProjectCategory::orderBy('created_at', 'desc')->get();
                return view('admin.project.category', compact('categories'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function deleteCategory($id)
    {
        $category = ProjectCategory::find($id);

        if ($category->project && $category->project->count() > 0) {
            return redirect()->back()->with('error', 'This category has projects attached. You can not delete it.');
        }
        if ($category) {
            $category->delete();
            return redirect()->back()->with('message', 'Category deleted successfully.');
        }
    }




    public function list(ProjectCategory $category){

        $projects = DB::table('projects')
        ->where('project_categories_id', $category->id)
        ->get();
        return view('admin.project.add', compact('projects', 'category'));

    }






    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {

            $project = new Project();
            $project->name = $request->name;
            $project->description = $request->description;
            $project->url = $request->url;
            $project->project_categories_id = $request->project_categories_id;
            $project->image = $request->image->store('assets/uploads/project');

            $project->save();
            return redirect()->back()->with('success', 'Project added successfully.');
        } else {




            return view('admin.project.add');
        }
    }
    public function edit(Request $request, $id)
    {
        $project = Project::find($id);
        if ($project) {
            if ($request->getMethod() == 'POST') {
                $project->name = $request->name;
                $project->description = $request->description;
                $project->url = $request->url;
                if ($request->hasFile('image')) {
                    $project->image = $request->image->store('assets/uploads/project');
                }
                $project->save();
                return redirect()->back()->with('message', 'Project updated successfully.');
            }
        }
    }
    public function delete($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->delete();
            return redirect()->back()->with('message', 'Project deleted successfully.');
        }
    }
}
