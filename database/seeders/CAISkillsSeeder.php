<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CAISkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'CAI', 'skill' => 'Proofreaders and Copy Markers'],
            ['unique_letter' => 'CAI', 'skill' => 'Advertising Sales Agents'],
            ['unique_letter' => 'CAI', 'skill' => 'Fundraisers'],
            ['unique_letter' => 'CAI', 'skill' => 'Media Programming Directors'],
            ['unique_letter' => 'CAI', 'skill' => 'Editors'],
            ['unique_letter' => 'CAI', 'skill' => 'Technical Writers'],
            ['unique_letter' => 'CAI', 'skill' => 'Advertising and Promotions Managers'],
            ['unique_letter' => 'CAI', 'skill' => 'Career/Technical Education Teachers, Middle School'],
            ['unique_letter' => 'CAI', 'skill' => 'Elementary School Teachers, Except Special Education'],
            ['unique_letter' => 'CAI', 'skill' => 'Training and Development Specialists'],
            ['unique_letter' => 'CAI', 'skill' => 'Writers and Authors'],
            ['unique_letter' => 'CAI', 'skill' => 'Mathematicians'],
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
