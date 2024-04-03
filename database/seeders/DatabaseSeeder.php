<?php

namespace Database\Seeders;

use App\Models\Employeer;
use App\Models\Job;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


       
        Tag::factory(100)->create();
        Job::factory(100)->create();
        Employeer::factory(100)->create();


    }
}
