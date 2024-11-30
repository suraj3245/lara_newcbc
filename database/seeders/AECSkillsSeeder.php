<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AECSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'AEC', 'skill' => 'Art Directors'],
            ['unique_letter' => 'AEC', 'skill' => 'Broadcast Announcers and Radio Disc Jockeys'],
            ['unique_letter' => 'AEC', 'skill' => 'Commercial and Industrial Designers'],
            ['unique_letter' => 'AEC', 'skill' => 'Editors'],
            ['unique_letter' => 'AEC', 'skill' => 'Film and Video Editors'],
            ['unique_letter' => 'AEC', 'skill' => 'Interior Designers'],
            ['unique_letter' => 'AEC', 'skill' => 'Music Directors and Composers'],
            ['unique_letter' => 'AEC', 'skill' => 'Musicians and Singers'],
            ['unique_letter' => 'AEC', 'skill' => 'News Analysts, Reporters, and Journalists'],
            ['unique_letter' => 'AEC', 'skill' => 'Video Game Designers'],
            ['unique_letter' => 'AEC', 'skill' => 'Choreographers'],
            ['unique_letter' => 'AEC', 'skill' => 'Graphic Designers'],
            ['unique_letter' => 'AEC', 'skill' => 'Advertising and Promotions Managers'],
            ['unique_letter' => 'AEC', 'skill' => 'Producers and Directors'],
            ['unique_letter' => 'AEC', 'skill' => 'Public Relations Specialists'],
            ['unique_letter' => 'AEC', 'skill' => 'Talent Directors'],
            ['unique_letter' => 'AEC', 'skill' => 'Writers and Authors'],
            ['unique_letter' => 'AEC', 'skill' => 'Adult Basic Education, Adult Secondary Education, and English as a Second Language Instructors'],
            ['unique_letter' => 'AEC', 'skill' => 'Secondary School Teachers, Except Special and Career/Technical Education'],
            ['unique_letter' => 'AEC', 'skill' => 'Advertising Sales Agents'],
            ['unique_letter' => 'AEC', 'skill' => 'Fundraisers'],
            ['unique_letter' => 'AEC', 'skill' => 'Media Programming Directors'],
            ['unique_letter' => 'AEC', 'skill' => 'Sustainability Specialists'],
            ['unique_letter' => 'AEC', 'skill' => 'Recreation Workers'],
            ['unique_letter' => 'AEC', 'skill' => 'Clergy'],
            ['unique_letter' => 'AEC', 'skill' => 'Industrial-Organizational Psychologists'],
            ['unique_letter' => 'AEC', 'skill' => 'Political Science Teachers, Postsecondary'],
            ['unique_letter' => 'AEC', 'skill' => 'Urban and Regional Planners'],
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
