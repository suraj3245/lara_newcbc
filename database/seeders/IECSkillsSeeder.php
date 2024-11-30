<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IECSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'IEC', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'IEC', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'IEC', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'IEC', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'IEC', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'IEC', 'skill' => 'Database Architects'],
            ['unique_letter' => 'IEC', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'IEC', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'IEC', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'IEC', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'IEC', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'IEC', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'IEC', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'IEC', 'skill' => 'Actuaries'],
            ['unique_letter' => 'IEC', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'IEC', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'IEC', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'IEC', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'IEC', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'IEC', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'IEC', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'IEC', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'IEC', 'skill' => 'Environmental Economists'],
            ['unique_letter' => 'IEC', 'skill' => 'Economists'],
            ['unique_letter' => 'IEC', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'IEC', 'skill' => 'Survey Researchers'],
            ['unique_letter' => 'IEC', 'skill' => 'Chief Sustainability Officers'],
            ['unique_letter' => 'IEC', 'skill' => 'Judicial Law Clerks'],
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
