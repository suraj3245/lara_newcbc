<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ICESkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'ICE', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'ICE', 'skill' => 'Database Architects'],
            ['unique_letter' => 'ICE', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'ICE', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'ICE', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'ICE', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'ICE', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'ICE', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'ICE', 'skill' => 'Actuaries'],
            ['unique_letter' => 'ICE', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'ICE', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'ICE', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'ICE', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'ICE', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'ICE', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'ICE', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'ICE', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'ICE', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'ICE', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'ICE', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'ICE', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'ICE', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'ICE', 'skill' => 'Economists'],
            ['unique_letter' => 'ICE', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'ICE', 'skill' => 'Survey Researchers'],
            ['unique_letter' => 'ICE', 'skill' => 'Environmental Economists'],
            ['unique_letter' => 'ICE', 'skill' => 'Judicial Law Clerks'],
            ['unique_letter' => 'ICE', 'skill' => 'Chief Sustainability Officers'],
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
