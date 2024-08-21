<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Students;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Students::create(['name' => 'Alex', 'age' => 18, 'Student_ID' => 1023568898]);
        Students::create(['name' => 'France', 'age' => 20, 'Student_ID' => 1023568798]);
        Students::create(['name' => 'Jenni', 'age' => 25, 'Student_ID' => 1023565698]);
    }
}
