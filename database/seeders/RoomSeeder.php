<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ro_Ro');

        for($i = 0; $i < 100; $i++) {
            Room::create([
                'created_by' => $faker->randomElement(User::pluck('id')),
                'title' => $faker->sentence(),
                'excerpt' => $faker->paragraph(),
                'max_clients' => rand(2,6),
                'status' => true
            ]);
        }
    }
}
