<?php

namespace Database\Seeders;

use App\Models\Instructor;
use App\Models\User;
use Database\Seeders\BatchSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\StudentSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(CategorySeeder::class);
        $this->call(BatchSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(InstructorSeeder::class);
    }
}
