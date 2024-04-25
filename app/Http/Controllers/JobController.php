<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use \Illuminate\Support\Facades\Mail;

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
        $job = Job::create([
            'title' => request('title') , 
            'salary' => request('salary') , 
            'employeer_id' => 1 
        ]);

        // dd($job->employeer->user->email);

        Mail::to($job->employeer->user)->queue(new JobPosted($job));
        
        return redirect('/jobs');
    }
    //
    function show(Job $job){
        return view('jobs.show',compact('job'));
    }
    //
    function edit(Job $job){
        

        // if(Auth::guest()){
        //     return redirect('/login');
        // }

        // if($job->employeer->user->isNot(Auth::user())){
        //     abort(403);
        // }

        // Gate::authorize('edit_job',$job);

        // if(Auth::user()->can('edit_job',$job)){
        //     dd();
        // }

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
