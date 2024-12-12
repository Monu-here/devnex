<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function add(Request $request)
    {
        try {
            if ($request->getMethod() == 'POST') {
                $validate = $request->validate([
                    'name' => 'required|string|max:255',
                    'position' => 'required|string|max:255',
                    'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                    'facebook' => 'required|string|max:255',
                    'instagram' => 'required|string|max:255',
                    'linkedin' => 'required|string|max:255',
                    'github' => 'required|string|max:255',
                ]);



                $team = new Team();
                $team->name = $request->name;
                $team->position = $request->position;
                $team->facebook = $request->facebook;
                $team->instagram = $request->instagram;
                $team->linkedin = $request->linkedin;
                $team->github = $request->github;
                $team->image = $request->image->store('assets/uploads/team');
                $team->save();
                return redirect()->back()->with('message', 'Team added successfully');
            } else {
                $teams = Team::orderBy('created_at', 'Desc')->get();
                return view('admin.team.add', compact('teams'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $team = Team::find($id);
            if ($team) {
                if ($request->getMethod() == 'POST') {

                    $team->name = $request->name;
                    $team->position = $request->position;
                    $team->facebook = $request->facebook;
                    $team->instagram = $request->instagram;
                    $team->linkedin = $request->linkedin;
                    $team->github = $request->github;
                    if ($request->hasFile('image')) {
                        $team->image = $request->image->store('assets/uploads/team');
                    }
                    $team->save();
                    return redirect()->route('admin.team.add')->with('message', 'Team edit successfully');
                } else {
                    return view('admin.team.edit', compact('team'));
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function delete($id)
    {
        $team = Team::find($id);
        if ($team) {
            $team->delete();
            return redirect()->back()->with('message', 'Team deleted successfully');
        }
        return redirect()->back()->with('error', 'Team not found');
    }
}
