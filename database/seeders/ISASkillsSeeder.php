<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ISASkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'ISA', 'skill' => 'Music Therapists'],
            ['unique_letter' => 'ISA', 'skill' => 'Clinical and Counseling Psychologists'],
            ['unique_letter' => 'ISA', 'skill' => 'Psychiatrists'],
            ['unique_letter' => 'ISA', 'skill' => 'Political Scientists'],
            ['unique_letter' => 'ISA', 'skill' => 'Sociologists'],
            ['unique_letter' => 'ISA', 'skill' => 'Area, Ethnic, and Cultural Studies Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Environmental Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Family and Consumer Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Genetic Counselors'],
            ['unique_letter' => 'ISA', 'skill' => 'History Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Mathematical Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Mental Health and Substance Abuse Social Workers'],
            ['unique_letter' => 'ISA', 'skill' => 'Mental Health Counselors'],
            ['unique_letter' => 'ISA', 'skill' => 'Psychology Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Sociology Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Speech-Language Pathologists'],
            ['unique_letter' => 'ISA', 'skill' => 'Art Therapists'],
            ['unique_letter' => 'ISA', 'skill' => 'Education Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'English Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Foreign Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Marriage and Family Therapists'],
            ['unique_letter' => 'ISA', 'skill' => 'Philosophy and Religion Teachers, Postsecondary'],
            ['unique_letter' => 'ISA', 'skill' => 'Substance Abuse and Behavioral Disorder Counselors'],
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
