<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
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


Route::resource('jobs' , JobController::class);

Route::get('/register',[AuthController::class , 'create']);
Route::post('/register',[AuthController::class , 'store']);

Route::get('/login',[AuthController::class , 'login']);
Route::post('/login',[AuthController::class , 'postLogin']);

Route::post('/logout',[AuthController::class , 'logout']);
