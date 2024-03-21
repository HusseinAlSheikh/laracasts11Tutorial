<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory;

    static function allJob():array
    {
        return [
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
    }

    static function findJob($id):array
    {
        // $jobs = static::allJob();

        // $job = Arr::first($jobs, fn($job) => $job['id']==$id );
        
        // if(!$job){
        //     abort(404);
        // }
        return Arr::first(static::allJob(), fn($job) => $job['id']==$id )??abort(404);
    }
}
