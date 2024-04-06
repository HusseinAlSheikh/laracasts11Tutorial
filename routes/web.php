<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/jobs', function () {
    $jobs = Job::with('employeer')->latest()->simplePaginate(3) ;
    
    return view('jobs.index',[
        'jobs' => $jobs
    ]);
})->name('jobs.index');

Route::get('/jobs/create',function(){
    return view('jobs.create');
});


Route::post('/jobs',function(){
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
});


Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show',compact('job'));
});