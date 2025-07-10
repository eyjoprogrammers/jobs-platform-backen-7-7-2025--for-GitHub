<?php

namespace Database\Seeders;

use App\Models\User;


use App\Models\Job;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Database\Seeders\JobSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call(JobSeeder::class);
}

}
