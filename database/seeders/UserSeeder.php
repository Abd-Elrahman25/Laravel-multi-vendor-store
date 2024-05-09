<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Abdelrahman Mohamed',
            'email'=>'Abdelrahaman22mohammed@gmail.com',
            'password'=>Hash::make('123'),
            'phone_number'=>'01212407723',
        ]);
    }
}
