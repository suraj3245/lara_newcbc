<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ISCSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'ISC', 'skill' => 'Community Health Workers'],
            ['unique_letter' => 'ISC', 'skill' => 'Critical Care Nurses'],
            ['unique_letter' => 'ISC', 'skill' => 'Exercise Physiologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Health Informatics Specialists'],
            ['unique_letter' => 'ISC', 'skill' => 'Registered Nurses'],
            ['unique_letter' => 'ISC', 'skill' => 'Rehabilitation Counselors'],
            ['unique_letter' => 'ISC', 'skill' => 'Special Education Teachers, Secondary School'],
            ['unique_letter' => 'ISC', 'skill' => 'Music Therapists'],
            ['unique_letter' => 'ISC', 'skill' => 'Allergists and Immunologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Audiologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Clinical and Counseling Psychologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Dermatologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Dietitians and Nutritionists'],
            ['unique_letter' => 'ISC', 'skill' => 'Epidemiologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Family Medicine Physicians'],
            ['unique_letter' => 'ISC', 'skill' => 'General Internal Medicine Physicians'],
            ['unique_letter' => 'ISC', 'skill' => 'Naturopathic Physicians'],
            ['unique_letter' => 'ISC', 'skill' => 'Neurologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Obstetricians and Gynecologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Ophthalmologists, Except Pediatric'],
            ['unique_letter' => 'ISC', 'skill' => 'Optometrists'],
            ['unique_letter' => 'ISC', 'skill' => 'Orthoptists'],
            ['unique_letter' => 'ISC', 'skill' => 'Pediatricians, General'],
            ['unique_letter' => 'ISC', 'skill' => 'Physical Medicine and Rehabilitation Physicians'],
            ['unique_letter' => 'ISC', 'skill' => 'Podiatrists'],
            ['unique_letter' => 'ISC', 'skill' => 'Psychiatrists'],
            ['unique_letter' => 'ISC', 'skill' => 'School Psychologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Sports Medicine Physicians'],
            ['unique_letter' => 'ISC', 'skill' => 'Urologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Anesthesiologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Dentists, General'],
            ['unique_letter' => 'ISC', 'skill' => 'Nurse Anesthetists'],
            ['unique_letter' => 'ISC', 'skill' => 'Orthodontists'],
            ['unique_letter' => 'ISC', 'skill' => 'Pharmacists'],
            ['unique_letter' => 'ISC', 'skill' => 'Political Scientists'],
            ['unique_letter' => 'ISC', 'skill' => 'Radiologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Sociologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Advanced Practice Psychiatric Nurses'],
            ['unique_letter' => 'ISC', 'skill' => 'Agricultural Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Anthropology and Archeology Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Area, Ethnic, and Cultural Studies Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Atmospheric, Earth, Marine, and Space Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Biological Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Chemistry Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Chiropractors'],
            ['unique_letter' => 'ISC', 'skill' => 'Computer Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Criminal Justice and Law Enforcement Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Economics Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Engineering Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Environmental Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Family and Consumer Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Forestry and Conservation Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Genetic Counselors'],
            ['unique_letter' => 'ISC', 'skill' => 'Geography Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Health Specialties Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Healthcare Social Workers'],
            ['unique_letter' => 'ISC', 'skill' => 'History Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Hospitalists'],
            ['unique_letter' => 'ISC', 'skill' => 'Instructional Coordinators'],
            ['unique_letter' => 'ISC', 'skill' => 'Law Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Library Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Low Vision Therapists, Orientation and Mobility Specialists, and Vision Rehabilitation Therapists'],
            ['unique_letter' => 'ISC', 'skill' => 'Mathematical Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Mental Health and Substance Abuse Social Workers'],
            ['unique_letter' => 'ISC', 'skill' => 'Mental Health Counselors'],
            ['unique_letter' => 'ISC', 'skill' => 'Nurse Midwives'],
            ['unique_letter' => 'ISC', 'skill' => 'Nurse Practitioners'],
            ['unique_letter' => 'ISC', 'skill' => 'Nursing Instructors and Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Occupational Therapists'],
            ['unique_letter' => 'ISC', 'skill' => 'Physical Therapists'],
            ['unique_letter' => 'ISC', 'skill' => 'Physician Assistants'],
            ['unique_letter' => 'ISC', 'skill' => 'Physics Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Preventive Medicine Physicians'],
            ['unique_letter' => 'ISC', 'skill' => 'Psychology Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Social Work Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Sociology Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Speech-Language Pathologists'],
            ['unique_letter' => 'ISC', 'skill' => 'Administrative Law Judges, Adjudicators, and Hearing Officers'],
            ['unique_letter' => 'ISC', 'skill' => 'Acupuncturists'],
            ['unique_letter' => 'ISC', 'skill' => 'Art Therapists'],
            ['unique_letter' => 'ISC', 'skill' => 'Athletic Trainers'],
            ['unique_letter' => 'ISC', 'skill' => 'Business Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Education Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'English Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Foreign Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Marriage and Family Therapists'],
            ['unique_letter' => 'ISC', 'skill' => 'Orthotists and Prosthetists'],
            ['unique_letter' => 'ISC', 'skill' => 'Philosophy and Religion Teachers, Postsecondary'],
            ['unique_letter' => 'ISC', 'skill' => 'Substance Abuse and Behavioral Disorder Counselors'],
            ['unique_letter' => 'ISC', 'skill' => 'Anesthesiologist Assistants'],
            ['unique_letter' => 'ISC', 'skill' => 'Oral and Maxillofacial Surgeons'],
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
