<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructors = [
            [
                'name'=>'U Kyaw Kyaw',
                'email'=>'kyawkayw@gmail.com',
                'phone'=>'09568756231'
            ],
            [
                'name'=>'Daw Hla Witt Yee',
                'email'=>'hlahla@gmail.com',
                'phone'=>'09668756231'
            ],
            [
                'name'=>'U Aung Aung',
                'email'=>'aung@gmail.com',
                'phone'=>'09668756231'
            ],
        ];
        foreach($instructors as $instructor)
        {
            Instructor::create($instructor);
        }
    }
}
