<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RIASkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills_with_unique_letter = [
            ['unique_letter' => 'RIA', 'skill' => 'Geographers'],
            ['unique_letter' => 'RIA', 'skill' => 'Marine Engineers and Naval Architects'],
            ['unique_letter' => 'RIA', 'skill' => 'Landscape Architects'],
            ['unique_letter' => 'RIA', 'skill' => 'Medical Scientists, Except Epidemiologists'],
            ['unique_letter' => 'RIA', 'skill' => 'Molecular and Cellular Biologists'],
            ['unique_letter' => 'RIA', 'skill' => 'Anthropologists and Archeologists'],
            ['unique_letter' => 'RIA', 'skill' => 'Astronomers'],
            ['unique_letter' => 'RIA', 'skill' => 'Biochemists and Biophysicists'],
            ['unique_letter' => 'RIA', 'skill' => 'Geneticists']
        ];

        foreach ($skills_with_unique_letter as $data) {
            CareerCombinationSkill::updateOrCreate(
                [
                    'unique_letter' => $data['unique_letter'],
                    'skill' => $data['skill']
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
