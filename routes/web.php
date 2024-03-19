<?php

use Illuminate\Support\Arr;
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
    return view('jobs',[
        'jobs' => [
            [
                'id'    => 1,
                'title' => 'Make Coffee',
            ],
            [
                'id'    => 2,
                'title' => 'Drink Coffee',
            ],
            [
                'id'    => 3,
                'title' => 'Start Code',
            ],
        ]
    ]);
});



Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id'    => 1,
            'title' => 'Make Coffee',
        ],
        [
            'id'    => 2,
            'title' => 'Drink Coffee',
        ],
        [
            'id'    => 3,
            'title' => 'Start Code',
        ],
    ];

    $job = Arr::first($jobs, fn($job) => $job['id']==$id );
    if(!$job){
        abort(404);
    }
    return view('job',compact('job'));
});