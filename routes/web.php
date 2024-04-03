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
    $jobs = Job::with('employeer')->simplePaginate(3) ;
    
    return view('jobs',[
        'jobs' => $jobs
    ]);
});



Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job',compact('job'));
});