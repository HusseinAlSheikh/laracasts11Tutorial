<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    $job = Job::first();

    TranslateJob::dispatch($job);
    return 'Done';
});


Route::view('/','home');

// Route::get('/about', function () {
//     return view('about');
// });
Route::view('/about','about');


// Route::get('/contact', function () {
//     return view('contact');
// });
Route::view('/contact','contact');



// Route::controller(JobController::class)->group(function(){
//     Route::get('/jobs','index');
//     Route::get('/jobs/create','create');
//     Route::post('/jobs','store');
//     Route::get('/jobs/{job}','show');
//     Route::get('/jobs/{job}/edit','edit');
//     Route::patch('/jobs/{job}','update');
//     Route::delete('/jobs/{job}','destroy');
// });


// Route::resource('jobs' , JobController::class)->only(['index','show']);
// Route::resource('jobs' , JobController::class)->except(['index','show'])->middleware(['auth']);
Route::get('/jobs',[JobController::class,'index']);
Route::get('/jobs/create',[JobController::class,'create']);
Route::post('/jobs',[JobController::class,'store'])->middleware('auth');
Route::get('/jobs/{job}',[JobController::class,'show']);
// Route::get('/jobs/{job}/edit',[JobController::class,'edit'])->middleware(['auth','can:edit_job,job']);
Route::get('/jobs/{job}/edit',[JobController::class,'edit'])->middleware(['auth'])->can('edit','job');
Route::patch('/jobs/{job}',[JobController::class,'update']);
Route::delete('/jobs/{job}',[JobController::class,'destroy']);


Route::get('/register',[AuthController::class , 'create']);
Route::post('/register',[AuthController::class , 'store']);

Route::get('/login',[AuthController::class , 'login'])->name('login');
Route::post('/login',[AuthController::class , 'postLogin']);

Route::post('/logout',[AuthController::class , 'logout']);
