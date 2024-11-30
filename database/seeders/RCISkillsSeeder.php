<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RCISkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'RCI', 'skill' => 'Airline Pilots, Copilots, and Flight Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Nanotechnology Engineering Technologists and Technicians'],
            ['unique_letter' => 'RCI', 'skill' => 'Surveyors'],
            ['unique_letter' => 'RCI', 'skill' => 'Biological Technicians'],
            ['unique_letter' => 'RCI', 'skill' => 'Cartographers and Photogrammetrists'],
            ['unique_letter' => 'RCI', 'skill' => 'Civil Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Environmental Engineering Technologists and Technicians'],
            ['unique_letter' => 'RCI', 'skill' => 'Geological Technicians, Except Hydrologic Technicians'],
            ['unique_letter' => 'RCI', 'skill' => 'Radio Frequency Identification Device Specialists'],
            ['unique_letter' => 'RCI', 'skill' => 'Remote Sensing Technicians'],
            ['unique_letter' => 'RCI', 'skill' => 'Bioinformatics Technicians'],
            ['unique_letter' => 'RCI', 'skill' => 'Chemists'],
            ['unique_letter' => 'RCI', 'skill' => 'Computer Hardware Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Computer Systems Engineers/Architects'],
            ['unique_letter' => 'RCI', 'skill' => 'Cytogenetic Technologists'],
            ['unique_letter' => 'RCI', 'skill' => 'Environmental Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Environmental Science and Protection Technicians, Including Health'],
            ['unique_letter' => 'RCI', 'skill' => 'Environmental Scientists and Specialists, Including Health'],
            ['unique_letter' => 'RCI', 'skill' => 'Food Scientists and Technologists'],
            ['unique_letter' => 'RCI', 'skill' => 'Geographic Information Systems Technologists and Technicians'],
            ['unique_letter' => 'RCI', 'skill' => 'Health and Safety Engineers, Except Mining Safety Engineers and Inspectors'],
            ['unique_letter' => 'RCI', 'skill' => 'Mechanical Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Mechatronics Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Medical and Clinical Laboratory Technologists'],
            ['unique_letter' => 'RCI', 'skill' => 'Network and Computer Systems Administrators'],
            ['unique_letter' => 'RCI', 'skill' => 'Nuclear Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Petroleum Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Photonics Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Robotics Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Validation Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Environmental Compliance Inspectors'],
            ['unique_letter' => 'RCI', 'skill' => 'Information Security Analysts'],
            ['unique_letter' => 'RCI', 'skill' => 'Geodetic Surveyors'],
            ['unique_letter' => 'RCI', 'skill' => 'Logistics Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Software Quality Assurance Analysts and Testers'],
            ['unique_letter' => 'RCI', 'skill' => 'Transportation Planners'],
            ['unique_letter' => 'RCI', 'skill' => 'Computer and Information Research Scientists'],
            ['unique_letter' => 'RCI', 'skill' => 'Microsystems Engineers'],
            ['unique_letter' => 'RCI', 'skill' => 'Bioinformatics Scientists'],
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
