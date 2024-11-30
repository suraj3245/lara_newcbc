<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CAESkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'CAE', 'skill' => 'Proofreaders and Copy Markers'],
            ['unique_letter' => 'CAE', 'skill' => 'Advertising Sales Agents'],
            ['unique_letter' => 'CAE', 'skill' => 'Fundraisers'],
            ['unique_letter' => 'CAE', 'skill' => 'Media Programming Directors'],
            ['unique_letter' => 'CAE', 'skill' => 'Editors'],
            ['unique_letter' => 'CAE', 'skill' => 'Technical Writers'],
            ['unique_letter' => 'CAE', 'skill' => 'Advertising and Promotions Managers'],
            ['unique_letter' => 'CAE', 'skill' => 'Career/Technical Education Teachers, Middle School'],
            ['unique_letter' => 'CAE', 'skill' => 'Elementary School Teachers, Except Special Education'],
            ['unique_letter' => 'CAE', 'skill' => 'Training and Development Specialists'],
            ['unique_letter' => 'CAE', 'skill' => 'Writers and Authors'],
            ['unique_letter' => 'CAE', 'skill' => 'Mathematicians'],
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
