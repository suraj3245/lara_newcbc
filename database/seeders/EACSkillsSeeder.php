<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EACSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'EAC', 'skill' => 'Advertising and Promotions Managers'],
            ['unique_letter' => 'EAC', 'skill' => 'Producers and Directors'],
            ['unique_letter' => 'EAC', 'skill' => 'Public Relations Specialists'],
            ['unique_letter' => 'EAC', 'skill' => 'Talent Directors'],
            ['unique_letter' => 'EAC', 'skill' => 'Writers and Authors'],
            ['unique_letter' => 'EAC', 'skill' => 'Advertising Sales Agents'],
            ['unique_letter' => 'EAC', 'skill' => 'Fundraisers'],
            ['unique_letter' => 'EAC', 'skill' => 'Media Programming Directors'],
            ['unique_letter' => 'EAC', 'skill' => 'Sustainability Specialists'],
            ['unique_letter' => 'EAC', 'skill' => 'Art Directors'],
            ['unique_letter' => 'EAC', 'skill' => 'Broadcast Announcers and Radio Disc Jockeys'],
            ['unique_letter' => 'EAC', 'skill' => 'Commercial and Industrial Designers'],
            ['unique_letter' => 'EAC', 'skill' => 'Editors'],
            ['unique_letter' => 'EAC', 'skill' => 'Film and Video Editors'],
            ['unique_letter' => 'EAC', 'skill' => 'Interior Designers'],
            ['unique_letter' => 'EAC', 'skill' => 'Music Directors and Composers'],
            ['unique_letter' => 'EAC', 'skill' => 'Musicians and Singers'],
            ['unique_letter' => 'EAC', 'skill' => 'News Analysts, Reporters, and Journalists'],
            ['unique_letter' => 'EAC', 'skill' => 'Video Game Designers'],
            ['unique_letter' => 'EAC', 'skill' => 'Recreation Workers'],
            ['unique_letter' => 'EAC', 'skill' => 'Choreographers'],
            ['unique_letter' => 'EAC', 'skill' => 'Graphic Designers'],
            ['unique_letter' => 'EAC', 'skill' => 'Adult Basic Education, Adult Secondary Education, and English as a Second Language Instructors'],
            ['unique_letter' => 'EAC', 'skill' => 'Secondary School Teachers, Except Special and Career/Technical Education'],
            ['unique_letter' => 'EAC', 'skill' => 'Clergy'],
            ['unique_letter' => 'EAC', 'skill' => 'Industrial-Organizational Psychologists'],
            ['unique_letter' => 'EAC', 'skill' => 'Political Science Teachers, Postsecondary'],
            ['unique_letter' => 'EAC', 'skill' => 'Urban and Regional Planners'],
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
