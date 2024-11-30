<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ECISkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'ECI', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'ECI', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'ECI', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'ECI', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'ECI', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'ECI', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'ECI', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'ECI', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'ECI', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'ECI', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'ECI', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'ECI', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'ECI', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'ECI', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'ECI', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'ECI', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'ECI', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'ECI', 'skill' => 'Actuaries'],
            ['unique_letter' => 'ECI', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'ECI', 'skill' => 'Database Architects'],
            ['unique_letter' => 'ECI', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'ECI', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'ECI', 'skill' => 'Chief Sustainability Officers'],
            ['unique_letter' => 'ECI', 'skill' => 'Judicial Law Clerks'],
            ['unique_letter' => 'ECI', 'skill' => 'Environmental Economists'],
            ['unique_letter' => 'ECI', 'skill' => 'Economists'],
            ['unique_letter' => 'ECI', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'ECI', 'skill' => 'Survey Researchers'],
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
