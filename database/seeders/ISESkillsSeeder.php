<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ISESkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $skillsWithUniqueLetter = [
            ['unique_letter' => 'ISE', 'skill' => 'Community Health Workers'],
            ['unique_letter' => 'ISE', 'skill' => 'Critical Care Nurses'],
            ['unique_letter' => 'ISE', 'skill' => 'Exercise Physiologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Health Informatics Specialists'],
            ['unique_letter' => 'ISE', 'skill' => 'Registered Nurses'],
            ['unique_letter' => 'ISE', 'skill' => 'Rehabilitation Counselors'],
            ['unique_letter' => 'ISE', 'skill' => 'Special Education Teachers, Secondary School'],
            ['unique_letter' => 'ISE', 'skill' => 'Music Therapists'],
            ['unique_letter' => 'ISE', 'skill' => 'Allergists and Immunologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Audiologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Clinical and Counseling Psychologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Dermatologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Dietitians and Nutritionists'],
            ['unique_letter' => 'ISE', 'skill' => 'Epidemiologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Family Medicine Physicians'],
            ['unique_letter' => 'ISE', 'skill' => 'General Internal Medicine Physicians'],
            ['unique_letter' => 'ISE', 'skill' => 'Naturopathic Physicians'],
            ['unique_letter' => 'ISE', 'skill' => 'Neurologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Obstetricians and Gynecologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Ophthalmologists, Except Pediatric'],
            ['unique_letter' => 'ISE', 'skill' => 'Optometrists'],
            ['unique_letter' => 'ISE', 'skill' => 'Orthoptists'],
            ['unique_letter' => 'ISE', 'skill' => 'Pediatricians, General'],
            ['unique_letter' => 'ISE', 'skill' => 'Physical Medicine and Rehabilitation Physicians'],
            ['unique_letter' => 'ISE', 'skill' => 'Podiatrists'],
            ['unique_letter' => 'ISE', 'skill' => 'Psychiatrists'],
            ['unique_letter' => 'ISE', 'skill' => 'School Psychologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Sports Medicine Physicians'],
            ['unique_letter' => 'ISE', 'skill' => 'Urologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Anesthesiologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Dentists, General'],
            ['unique_letter' => 'ISE', 'skill' => 'Nurse Anesthetists'],
            ['unique_letter' => 'ISE', 'skill' => 'Orthodontists'],
            ['unique_letter' => 'ISE', 'skill' => 'Pharmacists'],
            ['unique_letter' => 'ISE', 'skill' => 'Political Scientists'],
            ['unique_letter' => 'ISE', 'skill' => 'Radiologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Sociologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Advanced Practice Psychiatric Nurses'],
            ['unique_letter' => 'ISE', 'skill' => 'Agricultural Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Anthropology and Archeology Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Area, Ethnic, and Cultural Studies Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Atmospheric, Earth, Marine, and Space Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Biological Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Chemistry Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Chiropractors'],
            ['unique_letter' => 'ISE', 'skill' => 'Computer Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Criminal Justice and Law Enforcement Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Economics Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Engineering Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Environmental Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Family and Consumer Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Forestry and Conservation Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Genetic Counselors'],
            ['unique_letter' => 'ISE', 'skill' => 'Geography Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Health Specialties Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Healthcare Social Workers'],
            ['unique_letter' => 'ISE', 'skill' => 'History Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Hospitalists'],
            ['unique_letter' => 'ISE', 'skill' => 'Instructional Coordinators'],
            ['unique_letter' => 'ISE', 'skill' => 'Law Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Library Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Low Vision Therapists, Orientation and Mobility Specialists, and Vision Rehabilitation Therapists'],
            ['unique_letter' => 'ISE', 'skill' => 'Mathematical Science Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Mental Health and Substance Abuse Social Workers'],
            ['unique_letter' => 'ISE', 'skill' => 'Mental Health Counselors'],
            ['unique_letter' => 'ISE', 'skill' => 'Nurse Midwives'],
            ['unique_letter' => 'ISE', 'skill' => 'Nurse Practitioners'],
            ['unique_letter' => 'ISE', 'skill' => 'Nursing Instructors and Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Occupational Therapists'],
            ['unique_letter' => 'ISE', 'skill' => 'Physical Therapists'],
            ['unique_letter' => 'ISE', 'skill' => 'Physician Assistants'],
            ['unique_letter' => 'ISE', 'skill' => 'Physics Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Preventive Medicine Physicians'],
            ['unique_letter' => 'ISE', 'skill' => 'Psychology Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Social Work Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Sociology Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Speech-Language Pathologists'],
            ['unique_letter' => 'ISE', 'skill' => 'Administrative Law Judges, Adjudicators, and Hearing Officers'],
            ['unique_letter' => 'ISE', 'skill' => 'Acupuncturists'],
            ['unique_letter' => 'ISE', 'skill' => 'Art Therapists'],
            ['unique_letter' => 'ISE', 'skill' => 'Athletic Trainers'],
            ['unique_letter' => 'ISE', 'skill' => 'Business Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Education Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'English Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Foreign Language and Literature Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Marriage and Family Therapists'],
            ['unique_letter' => 'ISE', 'skill' => 'Orthotists and Prosthetists'],
            ['unique_letter' => 'ISE', 'skill' => 'Philosophy and Religion Teachers, Postsecondary'],
            ['unique_letter' => 'ISE', 'skill' => 'Substance Abuse and Behavioral Disorder Counselors'],
            ['unique_letter' => 'ISE', 'skill' => 'Anesthesiologist Assistants'],
            ['unique_letter' => 'ISE', 'skill' => 'Oral and Maxillofacial Surgeons'],
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
