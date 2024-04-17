<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    function index(){
        $jobs = Job::with('employeer')->latest()->simplePaginate(3) ;
    
        return view('jobs.index',[
            'jobs' => $jobs
        ]);
    }
    //
    function create(){
        return view('jobs.create');
    }
    //
    function store(){
        //----------vaildation 
        request()->validate([
            'title'  => 'required|min:3' , 
            'salary' => 'required'
        ]);
        //-----------
        Job::create([
            'title' => request('title') , 
            'salary' => request('salary') , 
            'employeer_id' => 1 
        ]);
        return redirect()->route('jobs.index');
    }
    //
    function show(Job $job){
        return view('jobs.show',compact('job'));
    }
    //
    function edit(Job $job){
        return view('jobs.edit',compact('job'));
    }
    //
    function update(Job $job){
        // $job = Job::findOrFail($id);
        // validate 
        request()->validate([
            'title'  => 'required|min:3' , 
            'salary' => 'required'
        ]);
        // authorize  on hold 
    
        $job->title = request('title');
        $job->salary = request('salary');
        $job->save();
        // update
        // redirect
        return redirect('/jobs/'.$job->id);

    }
    //
    function destroy(Job $job){
        $job->delete();
        return redirect('/jobs');
    }
    
}