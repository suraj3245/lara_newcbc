<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ICASkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'ICA', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'ICA', 'skill' => 'Computer Programmers'],
            ['unique_letter' => 'ICA', 'skill' => 'Data Warehousing Specialists'],
            ['unique_letter' => 'ICA', 'skill' => 'Database Architects'],
            ['unique_letter' => 'ICA', 'skill' => 'Geodetic Surveyors'],
            ['unique_letter' => 'ICA', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'ICA', 'skill' => 'Logistics Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Occupational Health and Safety Specialists'],
            ['unique_letter' => 'ICA', 'skill' => 'Software Quality Assurance Analysts and Testers'],
            ['unique_letter' => 'ICA', 'skill' => 'Transportation Planners'],
            ['unique_letter' => 'ICA', 'skill' => 'Bioinformatics Technicians'],
            ['unique_letter' => 'ICA', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'ICA', 'skill' => 'Chemists'],
            ['unique_letter' => 'ICA', 'skill' => 'Computer Hardware Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Computer Systems Engineers/Architects'],
            ['unique_letter' => 'ICA', 'skill' => 'Cytogenetic Technologists'],
            ['unique_letter' => 'ICA', 'skill' => 'Environmental Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Environmental Science and Protection Technicians, Including Health'],
            ['unique_letter' => 'ICA', 'skill' => 'Environmental Scientists and Specialists, Including Health'],
            ['unique_letter' => 'ICA', 'skill' => 'Food Scientists and Technologists'],
            ['unique_letter' => 'ICA', 'skill' => 'Geographic Information Systems Technologists and Technicians'],
            ['unique_letter' => 'ICA', 'skill' => 'Health and Safety Engineers, Except Mining Safety Engineers and Inspectors'],
            ['unique_letter' => 'ICA', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'ICA', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'ICA', 'skill' => 'Mechanical Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Mechatronics Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Medical and Clinical Laboratory Technologists'],
            ['unique_letter' => 'ICA', 'skill' => 'Network and Computer Systems Administrators'],
            ['unique_letter' => 'ICA', 'skill' => 'Nuclear Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Petroleum Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Photonics Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Robotics Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Validation Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'ICA', 'skill' => 'Actuaries'],
            ['unique_letter' => 'ICA', 'skill' => 'Clinical Data Managers'],
            ['unique_letter' => 'ICA', 'skill' => 'Database Administrators'],
            ['unique_letter' => 'ICA', 'skill' => 'Environmental Compliance Inspectors'],
            ['unique_letter' => 'ICA', 'skill' => 'Information Security Analysts'],
            ['unique_letter' => 'ICA', 'skill' => 'Social Science Research Assistants'],
            ['unique_letter' => 'ICA', 'skill' => 'Statistical Assistants'],
            ['unique_letter' => 'ICA', 'skill' => 'Biological Technicians'],
            ['unique_letter' => 'ICA', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'ICA', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'ICA', 'skill' => 'Cartographers and Photogrammetrists'],
            ['unique_letter' => 'ICA', 'skill' => 'Civil Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'ICA', 'skill' => 'Environmental Engineering Technologists and Technicians'],
            ['unique_letter' => 'ICA', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'ICA', 'skill' => 'Geological Technicians, Except Hydrologic Technicians'],
            ['unique_letter' => 'ICA', 'skill' => 'Radio Frequency Identification Device Specialists'],
            ['unique_letter' => 'ICA', 'skill' => 'Registered Nurses'],
            ['unique_letter' => 'ICA', 'skill' => 'Remote Sensing Technicians'],
            ['unique_letter' => 'ICA', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'ICA', 'skill' => 'Technical Writers'],
            ['unique_letter' => 'ICA', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'ICA', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'ICA', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'ICA', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'ICA', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'ICA', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'ICA', 'skill' => 'Airline Pilots, Copilots, and Flight Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'ICA', 'skill' => 'Nanotechnology Engineering Technologists and Technicians'],
            ['unique_letter' => 'ICA', 'skill' => 'Surveyors'],
            ['unique_letter' => 'ICA', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'ICA', 'skill' => 'Bioinformatics Scientists'],
            ['unique_letter' => 'ICA', 'skill' => 'Biostatisticians'],
            ['unique_letter' => 'ICA', 'skill' => 'Economists'],
            ['unique_letter' => 'ICA', 'skill' => 'Financial Quantitative Analysts'],
            ['unique_letter' => 'ICA', 'skill' => 'Mathematicians'],
            ['unique_letter' => 'ICA', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'ICA', 'skill' => 'Pharmacists'],
            ['unique_letter' => 'ICA', 'skill' => 'Survey Researchers'],
            ['unique_letter' => 'ICA', 'skill' => 'Computer and Information Research Scientists'],
            ['unique_letter' => 'ICA', 'skill' => 'Environmental Economists'],
            ['unique_letter' => 'ICA', 'skill' => 'Microsystems Engineers'],
            ['unique_letter' => 'ICA', 'skill' => 'Archivists'],
            ['unique_letter' => 'ICA', 'skill' => 'Statisticians'],
            ['unique_letter' => 'ICA', 'skill' => 'Computer Science Teachers, Postsecondary'],
            ['unique_letter' => 'ICA', 'skill' => 'Library Science Teachers, Postsecondary'],
            ['unique_letter' => 'ICA', 'skill' => 'Judicial Law Clerks'],
            ['unique_letter' => 'ICA', 'skill' => 'Chief Sustainability Officers'],
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
