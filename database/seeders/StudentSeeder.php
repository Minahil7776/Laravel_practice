<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {

            Student::create([
                'name' => 'Student ' . $i,
                'email' => 'student' . $i . '@gmail.com',
            ]);

        }
    }
}