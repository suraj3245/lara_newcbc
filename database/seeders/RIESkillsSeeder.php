<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RIESkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'RIE', 'skill' => 'Conservation Scientists'],
            ['unique_letter' => 'RIE', 'skill' => 'Foresters'],
            ['unique_letter' => 'RIE', 'skill' => 'Range Managers'],
            ['unique_letter' => 'RIE', 'skill' => 'Wind Energy Engineers'],
            ['unique_letter' => 'RIE', 'skill' => 'Agricultural Engineers'],
            ['unique_letter' => 'RIE', 'skill' => 'Fire-Prevention and Protection Engineers'],
            ['unique_letter' => 'RIE', 'skill' => 'Materials Engineers'],
            ['unique_letter' => 'RIE', 'skill' => 'Mining and Geological Engineers, Including Mining Safety Engineers'],
            ['unique_letter' => 'RIE', 'skill' => 'Water/Wastewater Engineers'],
            ['unique_letter' => 'RIE', 'skill' => 'Sales Engineers'],
            ['unique_letter' => 'RIE', 'skill' => 'Environmental Restoration Planners'],
            ['unique_letter' => 'RIE', 'skill' => 'Nanosystems Engineers'],
            ['unique_letter' => 'RIE', 'skill' => 'Architectural and Engineering Managers'],
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
