<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CEISkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'CEI', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'CEI', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'CEI', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'CEI', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'CEI', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'CEI', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'CEI', 'skill' => 'Actuaries'],
            ['unique_letter' => 'CEI', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'CEI', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'CEI', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'CEI', 'skill' => 'Database Architects'],
            ['unique_letter' => 'CEI', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'CEI', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'CEI', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'CEI', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'CEI', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'CEI', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'CEI', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'CEI', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'CEI', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'CEI', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'CEI', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'CEI', 'skill' => 'Judicial Law Clerks'],
            ['unique_letter' => 'CEI', 'skill' => 'Chief Sustainability Officers'],
            ['unique_letter' => 'CEI', 'skill' => 'Economists'],
            ['unique_letter' => 'CEI', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'CEI', 'skill' => 'Survey Researchers'],
            ['unique_letter' => 'CEI', 'skill' => 'Environmental Economists'],
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
