<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Batch;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batches = [
            [
                'name'=>'batch 1',
                'description'=>"Talent Professional class for batch 1. "
            ],
            [
                'name'=>'batch 2',
                'description'=>"Talent Professional class for batch 2. "
            ],
            [
                'name'=>'batch 3',
                'description'=>"Talent Professional class for batch 3. "
            ],
            [
                'name'=>'batch 4',
                'description'=>"Talent Professional class for batch 4. "
            ],
            [
                'name'=>'batch 5',
                'description'=>"Talent Professional class for batch 5. "
            ],
        ];
        foreach($batches as $batch)
        {
            Batch::create($batch);
        }

    }
}
