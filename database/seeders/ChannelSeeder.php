<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Channel;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::factory()->create([
            'name' => 'History',
        ]);

        Channel::factory()->create([
            'name' => 'MTV',
        ]);

        Channel::factory()->create([
            'name' => 'SBT',
        ]);
    }
}
