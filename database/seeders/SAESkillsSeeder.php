<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SAESkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'SAE', 'skill' => 'Adult Basic Education, Adult Secondary Education, and English as a Second Language Instructors'],
            ['unique_letter' => 'SAE', 'skill' => 'Secondary School Teachers, Except Special and Career/Technical Education'],
            ['unique_letter' => 'SAE', 'skill' => 'Recreation Workers'],
            ['unique_letter' => 'SAE', 'skill' => 'Choreographers'],
            ['unique_letter' => 'SAE', 'skill' => 'Broadcast Announcers and Radio Disc Jockeys'],
            ['unique_letter' => 'SAE', 'skill' => 'Music Directors and Composers'],
            ['unique_letter' => 'SAE', 'skill' => 'Musicians and Singers'],
            ['unique_letter' => 'SAE', 'skill' => 'Producers and Directors'],
            ['unique_letter' => 'SAE', 'skill' => 'Public Relations Specialists'],
            ['unique_letter' => 'SAE', 'skill' => 'Clergy'],
            ['unique_letter' => 'SAE', 'skill' => 'Political Science Teachers, Postsecondary'],
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
