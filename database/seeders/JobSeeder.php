<?php
namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['دوام كامل', 'دوام جزئي', 'عمل حر'];
        $locations = ['القاهرة', 'دبي', 'الرياض', 'بغداد', 'جدة'];
        $companies = ['شركة البرمجيات', 'Future Tech', 'SmartCode', 'DevHouse'];

        for ($i = 1; $i <= 20; $i++) {
            Job::create([
                'title' => 'وظيفة رقم ' . $i,
                'company_name' => $companies[array_rand($companies)],
                'location' => $locations[array_rand($locations)],
                'salary' => rand(5000, 12000) . ' جنيه',
                'job_type' => $types[array_rand($types)],
            ]);
        }
    }
}
