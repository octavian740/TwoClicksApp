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
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['name' => 'Octavian 1', 'email' => 'octavian1@test.com', 'password' => '1'],
            ['name' => 'Octavian 2', 'email' => 'octavian2@test.com', 'password' => '2'],
            ['name' => 'Octavian 3', 'email' => 'octavian3@test.com', 'password' => '3'],
            ['name' => 'Octavian 4', 'email' => 'octavian4@test.com', 'password' => '4'],
            ['name' => 'Octavian 5', 'email' => 'octavian5@test.com', 'password' => '5'],
            ['name' => 'Octavian 6', 'email' => 'octavian6@test.com', 'password' => '6']
        ])->each(function($user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password'])
            ]);
        });
    }
}
