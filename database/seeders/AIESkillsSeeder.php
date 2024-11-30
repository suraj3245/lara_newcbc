<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AIESkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'AIE', 'skill' => 'Landscape Architects'],
            ['unique_letter' => 'AIE', 'skill' => 'Poets, Lyricists and Creative Writers'],
            ['unique_letter' => 'AIE', 'skill' => 'Special Effects Artists and Animators'],
            ['unique_letter' => 'AIE', 'skill' => 'Technical Writers'],
            ['unique_letter' => 'AIE', 'skill' => 'Film and Video Editors'],
            ['unique_letter' => 'AIE', 'skill' => 'News Analysts, Reporters, and Journalists'],
            ['unique_letter' => 'AIE', 'skill' => 'Music Therapists'],
            ['unique_letter' => 'AIE', 'skill' => 'Geographers'],
            ['unique_letter' => 'AIE', 'skill' => 'Marine Engineers and Naval Architects'],
            ['unique_letter' => 'AIE', 'skill' => 'Sustainability Specialists'],
            ['unique_letter' => 'AIE', 'skill' => 'Architects, Except Landscape and Naval'],
            ['unique_letter' => 'AIE', 'skill' => 'Anthropologists and Archeologists'],
            ['unique_letter' => 'AIE', 'skill' => 'Astronomers'],
            ['unique_letter' => 'AIE', 'skill' => 'Biochemists and Biophysicists'],
            ['unique_letter' => 'AIE', 'skill' => 'Geneticists'],
            ['unique_letter' => 'AIE', 'skill' => 'Political Scientists'],
            ['unique_letter' => 'AIE', 'skill' => 'Sociologists'],
            ['unique_letter' => 'AIE', 'skill' => 'Art Therapists'],
            ['unique_letter' => 'AIE', 'skill' => 'Education Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'English Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Foreign Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Marriage and Family Therapists'],
            ['unique_letter' => 'AIE', 'skill' => 'Philosophy and Religion Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Substance Abuse and Behavioral Disorder Counselors'],
            ['unique_letter' => 'AIE', 'skill' => 'Clinical and Counseling Psychologists'],
            ['unique_letter' => 'AIE', 'skill' => 'Industrial-Organizational Psychologists'],
            ['unique_letter' => 'AIE', 'skill' => 'Mathematicians'],
            ['unique_letter' => 'AIE', 'skill' => 'Medical Scientists, Except Epidemiologists'],
            ['unique_letter' => 'AIE', 'skill' => 'Molecular and Cellular Biologists'],
            ['unique_letter' => 'AIE', 'skill' => 'Psychiatrists'],
            ['unique_letter' => 'AIE', 'skill' => 'Urban and Regional Planners'],
            ['unique_letter' => 'AIE', 'skill' => 'Area, Ethnic, and Cultural Studies Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Environmental Science Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Family and Consumer Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Genetic Counselors'],
            ['unique_letter' => 'AIE', 'skill' => 'History Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Mathematical Science Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Mental Health and Substance Abuse Social Workers'],
            ['unique_letter' => 'AIE', 'skill' => 'Mental Health Counselors'],
            ['unique_letter' => 'AIE', 'skill' => 'Psychology Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Sociology Teachers, Postsecondary'],
            ['unique_letter' => 'AIE', 'skill' => 'Speech-Language Pathologists'],
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
