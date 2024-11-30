<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['title' => 'Undergraduate (UG)', 'description' => null],
            ['title' => 'Postgraduate (PG)', 'description' => null],
            ['title' => 'Diploma', 'description' => null],
            ['title' => 'Doctorate (PhD)', 'description' => null],
            // Add more levels as needed
        ];


        foreach ($levels as $level) {
            Level::updateOrCreate(
                ['title' => $level['title']],
                ['description' => $level['description']]
            );
        }
    }
}
