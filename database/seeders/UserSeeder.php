<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
            'name'=>'John',
            'email'=>'Johnwick@gmail.com',
            'phone'=>'09123456789',
            'password'=>'password',
            'address'=>'Hlaing Township'
            ],
            [
            'name'=>'Doee',
                'email'=>'Doee@gmail.com',
                'phone'=>'09223456789',
                'password'=>'password',
                'address'=>'Sanchaung Township'
            ],
        ];
        foreach($users as $user)
        {
           User ::create($user);
        }



    }
}
