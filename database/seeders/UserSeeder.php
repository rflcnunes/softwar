<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Bruno',
            'email' => 'bruno@example.com',
        ]);

        User::factory()->create([
            'name' => 'Brian',
            'email' => 'brian@example.com',
        ]);

        User::factory()->create([
            'name' => 'Otávio',
            'email' => 'otavio@example.com',
        ]);

        User::all()->each(function ($user) {
            $user->channels()->attach([
                1 => ['minutes_watched' => rand(10, 200), 'date' => '2021-01-01'],
                2 => ['minutes_watched' => rand(10, 200), 'date' => '2021-01-02'],
                3 => ['minutes_watched' => rand(10, 200), 'date' => '2021-01-03'],
            ]);
        });       
    }
}
