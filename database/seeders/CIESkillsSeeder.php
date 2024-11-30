<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CIESkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'CIE', 'skill' => 'Actuaries'],
            ['unique_letter' => 'CIE', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'CIE', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'CIE', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'CIE', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'CIE', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'CIE', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'CIE', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'CIE', 'skill' => 'Database Architects'],
            ['unique_letter' => 'CIE', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'CIE', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'CIE', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'CIE', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'CIE', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'CIE', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'CIE', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'CIE', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'CIE', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'CIE', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'CIE', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'CIE', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'CIE', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'CIE', 'skill' => 'Judicial Law Clerks'],
            ['unique_letter' => 'CIE', 'skill' => 'Economists'],
            ['unique_letter' => 'CIE', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'CIE', 'skill' => 'Survey Researchers'],
            ['unique_letter' => 'CIE', 'skill' => 'Chief Sustainability Officers'],
            ['unique_letter' => 'CIE', 'skill' => 'Environmental Economists'],
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
