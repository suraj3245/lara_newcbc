<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RISSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'RIS', 'skill' => 'Critical Care Nurses'],
            ['unique_letter' => 'RIS', 'skill' => 'Exercise Physiologists'],
            ['unique_letter' => 'RIS', 'skill' => 'Anesthesiologist Assistants'],
            ['unique_letter' => 'RIS', 'skill' => 'Oral and Maxillofacial Surgeons'],
            ['unique_letter' => 'RIS', 'skill' => 'Anesthesiologists'],
            ['unique_letter' => 'RIS', 'skill' => 'Dentists, General'],
            ['unique_letter' => 'RIS', 'skill' => 'Nurse Anesthetists'],
            ['unique_letter' => 'RIS', 'skill' => 'Orthodontists'],
            ['unique_letter' => 'RIS', 'skill' => 'Radiologists'],
            ['unique_letter' => 'RIS', 'skill' => 'Acupuncturists'],
            ['unique_letter' => 'RIS', 'skill' => 'Athletic Trainers'],
            ['unique_letter' => 'RIS', 'skill' => 'Orthotists and Prosthetists'],
            ['unique_letter' => 'RIS', 'skill' => 'Allergists and Immunologists'],
            ['unique_letter' => 'RIS', 'skill' => 'Dermatologists'],
            ['unique_letter' => 'RIS', 'skill' => 'General Internal Medicine Physicians'],
            ['unique_letter' => 'RIS', 'skill' => 'Neurologists'],
            ['unique_letter' => 'RIS', 'skill' => 'Obstetricians and Gynecologists'],
            ['unique_letter' => 'RIS', 'skill' => 'Ophthalmologists, Except Pediatric'],
            ['unique_letter' => 'RIS', 'skill' => 'Optometrists'],
            ['unique_letter' => 'RIS', 'skill' => 'Orthoptists'],
            ['unique_letter' => 'RIS', 'skill' => 'Physical Medicine and Rehabilitation Physicians'],
            ['unique_letter' => 'RIS', 'skill' => 'Podiatrists'],
            ['unique_letter' => 'RIS', 'skill' => 'Sports Medicine Physicians'],
            ['unique_letter' => 'RIS', 'skill' => 'Urologists'],
            ['unique_letter' => 'RIS', 'skill' => 'Agricultural Sciences Teachers, Postsecondary'],
            ['unique_letter' => 'RIS', 'skill' => 'Chemistry Teachers, Postsecondary'],
            ['unique_letter' => 'RIS', 'skill' => 'Chiropractors'],
            ['unique_letter' => 'RIS', 'skill' => 'Engineering Teachers, Postsecondary'],
            ['unique_letter' => 'RIS', 'skill' => 'Forestry and Conservation Science Teachers, Postsecondary'],
            ['unique_letter' => 'RIS', 'skill' => 'Low Vision Therapists, Orientation and Mobility Specialists, and Vision Rehabilitation Therapists'],
            ['unique_letter' => 'RIS', 'skill' => 'Nurse Practitioners'],
            ['unique_letter' => 'RIS', 'skill' => 'Physical Therapists'],
            ['unique_letter' => 'RIS', 'skill' => 'Physician Assistants'],
            ['unique_letter' => 'RIS', 'skill' => 'Preventive Medicine Physicians'],
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
