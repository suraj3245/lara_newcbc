<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IAESkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'IAE', 'skill' => 'Geographers'],
            ['unique_letter' => 'IAE', 'skill' => 'Marine Engineers and Naval Architects'],
            ['unique_letter' => 'IAE', 'skill' => 'Landscape Architects'],
            ['unique_letter' => 'IAE', 'skill' => 'Poets, Lyricists and Creative Writers'],
            ['unique_letter' => 'IAE', 'skill' => 'Special Effects Artists and Animators'],
            ['unique_letter' => 'IAE', 'skill' => 'Technical Writers'],
            ['unique_letter' => 'IAE', 'skill' => 'Sustainability Specialists'],
            ['unique_letter' => 'IAE', 'skill' => 'Film and Video Editors'],
            ['unique_letter' => 'IAE', 'skill' => 'News Analysts, Reporters, and Journalists'],
            ['unique_letter' => 'IAE', 'skill' => 'Music Therapists'],
            ['unique_letter' => 'IAE', 'skill' => 'Anthropologists and Archeologists'],
            ['unique_letter' => 'IAE', 'skill' => 'Astronomers'],
            ['unique_letter' => 'IAE', 'skill' => 'Biochemists and Biophysicists'],
            ['unique_letter' => 'IAE', 'skill' => 'Geneticists'],
            ['unique_letter' => 'IAE', 'skill' => 'Political Scientists'],
            ['unique_letter' => 'IAE', 'skill' => 'Sociologists'],
            ['unique_letter' => 'IAE', 'skill' => 'Clinical and Counseling Psychologists'],
            ['unique_letter' => 'IAE', 'skill' => 'Industrial-Organizational Psychologists'],
            ['unique_letter' => 'IAE', 'skill' => 'Mathematicians'],
            ['unique_letter' => 'IAE', 'skill' => 'Medical Scientists, Except Epidemiologists'],
            ['unique_letter' => 'IAE', 'skill' => 'Molecular and Cellular Biologists'],
            ['unique_letter' => 'IAE', 'skill' => 'Psychiatrists'],
            ['unique_letter' => 'IAE', 'skill' => 'Urban and Regional Planners'],
            ['unique_letter' => 'IAE', 'skill' => 'Architects, Except Landscape and Naval'],
            ['unique_letter' => 'IAE', 'skill' => 'Area, Ethnic, and Cultural Studies Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Environmental Science Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Family and Consumer Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Genetic Counselors'],
            ['unique_letter' => 'IAE', 'skill' => 'History Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Mathematical Science Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Mental Health and Substance Abuse Social Workers'],
            ['unique_letter' => 'IAE', 'skill' => 'Mental Health Counselors'],
            ['unique_letter' => 'IAE', 'skill' => 'Psychology Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Sociology Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Speech-Language Pathologists'],
            ['unique_letter' => 'IAE', 'skill' => 'Art Therapists'],
            ['unique_letter' => 'IAE', 'skill' => 'Education Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'English Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Foreign Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Marriage and Family Therapists'],
            ['unique_letter' => 'IAE', 'skill' => 'Philosophy and Religion Teachers, Postsecondary'],
            ['unique_letter' => 'IAE', 'skill' => 'Substance Abuse and Behavioral Disorder Counselors'],
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
