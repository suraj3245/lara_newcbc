<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RASSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'RAS', 'skill' => 'Museum Technicians and Conservators'],
            ['unique_letter' => 'RAS', 'skill' => 'Graphic Designers'],
            ['unique_letter' => 'RAS', 'skill' => 'Geographers'],
            ['unique_letter' => 'RAS', 'skill' => 'Marine Engineers and Naval Architects'],
            ['unique_letter' => 'RAS', 'skill' => 'Park Naturalists'],
            ['unique_letter' => 'RAS', 'skill' => 'Commercial and Industrial Designers'],
            ['unique_letter' => 'RAS', 'skill' => 'Landscape Architects'],
            ['unique_letter' => 'RAS', 'skill' => 'Set and Exhibit Designers'],
            ['unique_letter' => 'RAS', 'skill' => 'Medical Scientists, Except Epidemiologists'],
            ['unique_letter' => 'RAS', 'skill' => 'Molecular and Cellular Biologists'],
            ['unique_letter' => 'RAS', 'skill' => 'Anthropologists and Archeologists'],
            ['unique_letter' => 'RAS', 'skill' => 'Astronomers'],
            ['unique_letter' => 'RAS', 'skill' => 'Biochemists and Biophysicists'],
            ['unique_letter' => 'RAS', 'skill' => 'Geneticists'],
        ];

        foreach ($skillsWithUniqueLetter as $data) {
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
