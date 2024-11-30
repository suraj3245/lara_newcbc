<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ACISkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'ACI', 'skill' => 'Editors'],
            ['unique_letter' => 'ACI', 'skill' => 'Technical Writers'],
            ['unique_letter' => 'ACI', 'skill' => 'Proofreaders and Copy Markers'],
            ['unique_letter' => 'ACI', 'skill' => 'Advertising and Promotions Managers'],
            ['unique_letter' => 'ACI', 'skill' => 'Career/Technical Education Teachers, Middle School'],
            ['unique_letter' => 'ACI', 'skill' => 'Elementary School Teachers, Except Special Education'],
            ['unique_letter' => 'ACI', 'skill' => 'Training and Development Specialists'],
            ['unique_letter' => 'ACI', 'skill' => 'Writers and Authors'],
            ['unique_letter' => 'ACI', 'skill' => 'Advertising Sales Agents'],
            ['unique_letter' => 'ACI', 'skill' => 'Fundraisers'],
            ['unique_letter' => 'ACI', 'skill' => 'Media Programming Directors'],
            ['unique_letter' => 'ACI', 'skill' => 'Mathematicians'],
            // ... and so on for any additional professions
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
