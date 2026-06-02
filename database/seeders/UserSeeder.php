<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


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
            'password'=> Hash::make('password'),
            'address'=>'Hlaing Township'
            ],
            [
            'name'=>'Doee',
                'email'=>'Doee@gmail.com',
                'phone'=>'09223456789',
                'password'=> Hash::make('password'),
                'address'=>'Sanchaung Township'
            ],
        ];
        foreach($users as $user)
        {
           User ::create($user);
        }



    }
}
