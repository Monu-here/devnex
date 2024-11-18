<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkProcess;
use Illuminate\Http\Request;

class WorkProcessController extends Controller
{
    public function index(){
       $colums = array(['sn','title','description','image']);
       $data = array();
       $workprocesss = WorkProcess::count()->all();
       $totalWorkProcess = $workprocesss->count();
       $filterWorkProcess = $totalWorkProcess;
   

    }
    public function add(Request $request){
        if($request->getMethod()=='POST'){
            $workProcess = new WorkProcess();
            $workProcess->title = $request->title;
            $workProcess->description = $request->description;
            $workProcess->image = $request->image->store('assets/uploads/workprocess');
            $workProcess->save();
            return redirect()->back()->with('message','Work Process added successfully.');
        }
        else{
            $workProcesss = WorkProcess::get();
            return view('admin.workprocess.add',compact('workProcesss'));
        }
    }
    public function edit(Request $request ,$id){
        $workProcess = WorkProcess::find($id);
        if($workProcess){
            if($request->getMethod()=='POST'){
                $workProcess->title = $request->title;
                $workProcess->description = $request->description;
                if($request->hasFile('image')){
                    $workProcess->image = $request->image->store('assets/uploads/workprocess');
                }
                $workProcess->save();
                return redirect()->back()->with('message','Work Process updated successfully.');
            }
        }
        else{
            return redirect()->back()->with('message','Work Process not found.');
        }
    }
    public function delete($id){
        $workProcess = WorkProcess::find($id);
        if($workProcess){
            $workProcess->delete();
            return redirect()->back()->with('message','Work Process deleted successfully.');
        }
        else{
            return redirect()->back()->with('message','Work Process not found.');
        }
    }
}
