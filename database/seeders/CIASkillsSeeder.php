<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CIASkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'CIA', 'skill' => 'Actuaries'],
            ['unique_letter' => 'CIA', 'skill' => 'Clinical Data Managers'],
            ['unique_letter' => 'CIA', 'skill' => 'Database Administrators'],
            ['unique_letter' => 'CIA', 'skill' => 'Environmental Compliance Inspectors'],
            ['unique_letter' => 'CIA', 'skill' => 'Information Security Analysts'],
            ['unique_letter' => 'CIA', 'skill' => 'Social Science Research Assistants'],
            ['unique_letter' => 'CIA', 'skill' => 'Statistical Assistants'],
            ['unique_letter' => 'CIA', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'CIA', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'CIA', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'CIA', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'CIA', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'CIA', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'CIA', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'CIA', 'skill' => 'Computer Programmers'],
            ['unique_letter' => 'CIA', 'skill' => 'Data Warehousing Specialists'],
            ['unique_letter' => 'CIA', 'skill' => 'Database Architects'],
            ['unique_letter' => 'CIA', 'skill' => 'Geodetic Surveyors'],
            ['unique_letter' => 'CIA', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'CIA', 'skill' => 'Logistics Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Occupational Health and Safety Specialists'],
            ['unique_letter' => 'CIA', 'skill' => 'Software Quality Assurance Analysts and Testers'],
            ['unique_letter' => 'CIA', 'skill' => 'Transportation Planners'],
            ['unique_letter' => 'CIA', 'skill' => 'Airline Pilots, Copilots, and Flight Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'CIA', 'skill' => 'Nanotechnology Engineering Technologists and Technicians'],
            ['unique_letter' => 'CIA', 'skill' => 'Surveyors'],
            ['unique_letter' => 'CIA', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'CIA', 'skill' => 'Bioinformatics Technicians'],
            ['unique_letter' => 'CIA', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'CIA', 'skill' => 'Chemists'],
            ['unique_letter' => 'CIA', 'skill' => 'Computer Hardware Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Computer Systems Engineers/Architects'],
            ['unique_letter' => 'CIA', 'skill' => 'Cytogenetic Technologists'],
            ['unique_letter' => 'CIA', 'skill' => 'Environmental Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Environmental Science and Protection Technicians, Including Health'],
            ['unique_letter' => 'CIA', 'skill' => 'Environmental Scientists and Specialists, Including Health'],
            ['unique_letter' => 'CIA', 'skill' => 'Food Scientists and Technologists'],
            ['unique_letter' => 'CIA', 'skill' => 'Geographic Information Systems Technologists and Technicians'],
            ['unique_letter' => 'CIA', 'skill' => 'Health and Safety Engineers, Except Mining Safety Engineers and Inspectors'],
            ['unique_letter' => 'CIA', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'CIA', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'CIA', 'skill' => 'Mechanical Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Mechatronics Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Medical and Clinical Laboratory Technologists'],
            ['unique_letter' => 'CIA', 'skill' => 'Network and Computer Systems Administrators'],
            ['unique_letter' => 'CIA', 'skill' => 'Nuclear Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Petroleum Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Photonics Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Robotics Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Validation Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'CIA', 'skill' => 'Biological Technicians'],
            ['unique_letter' => 'CIA', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'CIA', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'CIA', 'skill' => 'Cartographers and Photogrammetrists'],
            ['unique_letter' => 'CIA', 'skill' => 'Civil Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'CIA', 'skill' => 'Environmental Engineering Technologists and Technicians'],
            ['unique_letter' => 'CIA', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'CIA', 'skill' => 'Geological Technicians, Except Hydrologic Technicians'],
            ['unique_letter' => 'CIA', 'skill' => 'Radio Frequency Identification Device Specialists'],
            ['unique_letter' => 'CIA', 'skill' => 'Registered Nurses'],
            ['unique_letter' => 'CIA', 'skill' => 'Remote Sensing Technicians'],
            ['unique_letter' => 'CIA', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'CIA', 'skill' => 'Technical Writers'],
            ['unique_letter' => 'CIA', 'skill' => 'Archivists'],
            ['unique_letter' => 'CIA', 'skill' => 'Statisticians'],
            ['unique_letter' => 'CIA', 'skill' => 'Judicial Law Clerks'],
            ['unique_letter' => 'CIA', 'skill' => 'Bioinformatics Scientists'],
            ['unique_letter' => 'CIA', 'skill' => 'Biostatisticians'],
            ['unique_letter' => 'CIA', 'skill' => 'Economists'],
            ['unique_letter' => 'CIA', 'skill' => 'Financial Quantitative Analysts'],
            ['unique_letter' => 'CIA', 'skill' => 'Mathematicians'],
            ['unique_letter' => 'CIA', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'CIA', 'skill' => 'Pharmacists'],
            ['unique_letter' => 'CIA', 'skill' => 'Survey Researchers'],
            ['unique_letter' => 'CIA', 'skill' => 'Chief Sustainability Officers'],
            ['unique_letter' => 'CIA', 'skill' => 'Computer and Information Research Scientists'],
            ['unique_letter' => 'CIA', 'skill' => 'Environmental Economists'],
            ['unique_letter' => 'CIA', 'skill' => 'Microsystems Engineers'],
            ['unique_letter' => 'CIA', 'skill' => 'Computer Science Teachers, Postsecondary'],
            ['unique_letter' => 'CIA', 'skill' => 'Library Science Teachers, Postsecondary'],
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
