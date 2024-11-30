<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EICSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'EIC', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'EIC', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'EIC', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'EIC', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'EIC', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'EIC', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'EIC', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'EIC', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'EIC', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'EIC', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'EIC', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'EIC', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'EIC', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'EIC', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'EIC', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'EIC', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'EIC', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'EIC', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'EIC', 'skill' => 'Database Architects'],
            ['unique_letter' => 'EIC', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'EIC', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'EIC', 'skill' => 'Actuaries'],
            ['unique_letter' => 'EIC', 'skill' => 'Chief Sustainability Officers'],
            ['unique_letter' => 'EIC', 'skill' => 'Environmental Economists'],
            ['unique_letter' => 'EIC', 'skill' => 'Judicial Law Clerks'],
            ['unique_letter' => 'EIC', 'skill' => 'Economists'],
            ['unique_letter' => 'EIC', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'EIC', 'skill' => 'Survey Researchers'],
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
