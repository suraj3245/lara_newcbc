<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AICSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'AIC', 'skill' => 'Landscape Architects'],
            ['unique_letter' => 'AIC', 'skill' => 'Poets, Lyricists and Creative Writers'],
            ['unique_letter' => 'AIC', 'skill' => 'Special Effects Artists and Animators'],
            ['unique_letter' => 'AIC', 'skill' => 'Technical Writers'],
            ['unique_letter' => 'AIC', 'skill' => 'Film and Video Editors'],
            ['unique_letter' => 'AIC', 'skill' => 'News Analysts, Reporters, and Journalists'],
            ['unique_letter' => 'AIC', 'skill' => 'Music Therapists'],
            ['unique_letter' => 'AIC', 'skill' => 'Geographers'],
            ['unique_letter' => 'AIC', 'skill' => 'Marine Engineers and Naval Architects'],
            ['unique_letter' => 'AIC', 'skill' => 'Sustainability Specialists'],
            ['unique_letter' => 'AIC', 'skill' => 'Architects, Except Landscape and Naval'],
            ['unique_letter' => 'AIC', 'skill' => 'Anthropologists and Archeologists'],
            ['unique_letter' => 'AIC', 'skill' => 'Astronomers'],
            ['unique_letter' => 'AIC', 'skill' => 'Biochemists and Biophysicists'],
            ['unique_letter' => 'AIC', 'skill' => 'Geneticists'],
            ['unique_letter' => 'AIC', 'skill' => 'Political Scientists'],
            ['unique_letter' => 'AIC', 'skill' => 'Sociologists'],
            ['unique_letter' => 'AIC', 'skill' => 'Art Therapists'],
            ['unique_letter' => 'AIC', 'skill' => 'Education Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'English Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Foreign Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Marriage and Family Therapists'],
            ['unique_letter' => 'AIC', 'skill' => 'Philosophy and Religion Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Substance Abuse and Behavioral Disorder Counselors'],
            ['unique_letter' => 'AIC', 'skill' => 'Clinical and Counseling Psychologists'],
            ['unique_letter' => 'AIC', 'skill' => 'Industrial-Organizational Psychologists'],
            ['unique_letter' => 'AIC', 'skill' => 'Mathematicians'],
            ['unique_letter' => 'AIC', 'skill' => 'Medical Scientists, Except Epidemiologists'],
            ['unique_letter' => 'AIC', 'skill' => 'Molecular and Cellular Biologists'],
            ['unique_letter' => 'AIC', 'skill' => 'Psychiatrists'],
            ['unique_letter' => 'AIC', 'skill' => 'Urban and Regional Planners'],
            ['unique_letter' => 'AIC', 'skill' => 'Area, Ethnic, and Cultural Studies Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Environmental Science Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Family and Consumer Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Genetic Counselors'],
            ['unique_letter' => 'AIC', 'skill' => 'History Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Mathematical Science Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Mental Health and Substance Abuse Social Workers'],
            ['unique_letter' => 'AIC', 'skill' => 'Mental Health Counselors'],
            ['unique_letter' => 'AIC', 'skill' => 'Psychology Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Sociology Teachers, Postsecondary'],
            ['unique_letter' => 'AIC', 'skill' => 'Speech-Language Pathologists'],
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
