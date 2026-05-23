<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students =[
            [
                'name'=>'John',
                'email'=>'Johnwick@gmail.com',
                'phone'=>'09123456789',
                'address'=>'Hlaing Township'
            ],
            [
                'name'=>'Doee',
                'email'=>'Doee@gmail.com',
                'phone'=>'09223456789',
                'address'=>'Sanchaung Township'
            ],
            [
                'name'=>'Pan Pan',
                'email'=>'pan@gmail.com',
                'phone'=>'09323456789',
                'address'=>'Insein Township'
            ],
            [
                'name'=>'Mg Mg',
                'email'=>'mgmg@gmail.com',
                'phone'=>'09423456789',
                'address'=>'',
            ],

        ];
        foreach ($students as $student)
        {
            Student::create($student);
        }

    }
}
