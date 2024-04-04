<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings' ;

    protected $guarded = [] ;

    // protected $fillable = ['title','salary','employeer_id'];

    function employeer(){
        return $this->belongsTo(Employeer::class);
    }


    function tags(){
        return $this->belongsToMany(Tag::class,foreignPivotKey:"job_listing_id");
    }
}
