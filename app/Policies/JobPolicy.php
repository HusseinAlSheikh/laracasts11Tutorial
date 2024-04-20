<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
   function edit(User $user , Job $job) : bool  {
         return $job->employeer->user->is($user);
   }
}
