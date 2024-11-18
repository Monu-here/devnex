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
    //    if(isEmpty($workprocesss)){
    //        foreach($filterWorkProcess as $workProcess){
    //         //   
            
    //             //    $data['sn'] => $request->id
    //             //    'title' => $workProcess->title,
    //             //    'description' => $workProcess->description,
    //             //    'image' => asset($workProcess->image),
    //             //    'action' => '<a href="'.route('admin.workprocess.edit',$workProcess->id).'" class="btn btn-sm btn-primary">Edit</a> <a href="'.route('admin.workprocess.delete',$workProcess->id).'" class="btn btn-sm btn-danger">Delete</a>'
        //    }
        // }
            //    )

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
            return view('admin.workprocess.add');
        }
    }
}
