<?php

namespace Database\Seeders;
use App\models\User;
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
        user::create([
            'name' => 'Administrator',
            'email' => 'wkAdmin@gmail.com',
            'password'=> Hash::make('adminWk'),
            'role' => 'admin',
        ]);
    }
}
