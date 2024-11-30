<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SACSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'SAC', 'skill' => 'Adult Basic Education, Adult Secondary Education, and English as a Second Language Instructors'],
            ['unique_letter' => 'SAC', 'skill' => 'Career/Technical Education Teachers, Middle School'],
            ['unique_letter' => 'SAC', 'skill' => 'Elementary School Teachers, Except Special Education'],
            ['unique_letter' => 'SAC', 'skill' => 'Kindergarten Teachers, Except Special Education'],
            ['unique_letter' => 'SAC', 'skill' => 'Middle School Teachers, Except Special and Career/Technical Education'],
            ['unique_letter' => 'SAC', 'skill' => 'Music Therapists'],
            ['unique_letter' => 'SAC', 'skill' => 'Recreational Therapists'],
            ['unique_letter' => 'SAC', 'skill' => 'Secondary School Teachers, Except Special and Career/Technical Education'],
            ['unique_letter' => 'SAC', 'skill' => 'Special Education Teachers, Middle School'],
            ['unique_letter' => 'SAC', 'skill' => 'Training and Development Specialists'],
            ['unique_letter' => 'SAC', 'skill' => 'Park Naturalists'],
            ['unique_letter' => 'SAC', 'skill' => 'Recreation Workers'],
            ['unique_letter' => 'SAC', 'skill' => 'Choreographers'],
            ['unique_letter' => 'SAC', 'skill' => 'Interpreters and Translators'],
            ['unique_letter' => 'SAC', 'skill' => 'Broadcast Announcers and Radio Disc Jockeys'],
            ['unique_letter' => 'SAC', 'skill' => 'Music Directors and Composers'],
            ['unique_letter' => 'SAC', 'skill' => 'Musicians and Singers'],
            ['unique_letter' => 'SAC', 'skill' => 'Producers and Directors'],
            ['unique_letter' => 'SAC', 'skill' => 'Public Relations Specialists'],
            ['unique_letter' => 'SAC', 'skill' => 'Architecture Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Art Therapists'],
            ['unique_letter' => 'SAC', 'skill' => 'Art, Drama, and Music Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Communications Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Education Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'English Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Foreign Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Marriage and Family Therapists'],
            ['unique_letter' => 'SAC', 'skill' => 'Philosophy and Religion Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Special Education Teachers, Preschool'],
            ['unique_letter' => 'SAC', 'skill' => 'Substance Abuse and Behavioral Disorder Counselors'],
            ['unique_letter' => 'SAC', 'skill' => 'Area, Ethnic, and Cultural Studies Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Clergy'],
            ['unique_letter' => 'SAC', 'skill' => 'Environmental Science Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Family and Consumer Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Genetic Counselors'],
            ['unique_letter' => 'SAC', 'skill' => 'History Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Mathematical Science Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Mental Health and Substance Abuse Social Workers'],
            ['unique_letter' => 'SAC', 'skill' => 'Mental Health Counselors'],
            ['unique_letter' => 'SAC', 'skill' => 'Political Science Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Psychology Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Sociology Teachers, Postsecondary'],
            ['unique_letter' => 'SAC', 'skill' => 'Speech-Language Pathologists'],
            ['unique_letter' => 'SAC', 'skill' => 'Clinical and Counseling Psychologists'],
            ['unique_letter' => 'SAC', 'skill' => 'Psychiatrists'],
            ['unique_letter' => 'SAC', 'skill' => 'Political Scientists'],
            ['unique_letter' => 'SAC', 'skill' => 'Sociologists'],
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
