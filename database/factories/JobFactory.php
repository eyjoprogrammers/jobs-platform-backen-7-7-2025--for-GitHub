<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        // تعيين اللغة إلى العربية
        $faker = \Faker\Factory::create('ar_EG');

        return [
            'title' => $faker->jobTitle,                      // عنوان الوظيفة
            'description' => $faker->text(100),           // وصف مختصر
         
            'catagory' => $faker->text(20),
            'salary' => $faker->numberBetween(3000, 15000),   // الراتب
        ];
    }
}