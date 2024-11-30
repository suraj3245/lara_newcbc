<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IESSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'IES', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'IES', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'IES', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'IES', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'IES', 'skill' => 'Agricultural Engineers'],
            ['unique_letter' => 'IES', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'IES', 'skill' => 'Database Architects'],
            ['unique_letter' => 'IES', 'skill' => 'Fire-Prevention and Protection Engineers'],
            ['unique_letter' => 'IES', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'IES', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'IES', 'skill' => 'Materials Engineers'],
            ['unique_letter' => 'IES', 'skill' => 'Mining and Geological Engineers, Including Mining Safety Engineers'],
            ['unique_letter' => 'IES', 'skill' => 'Water/Wastewater Engineers'],
            ['unique_letter' => 'IES', 'skill' => 'Biofuels/Biodiesel Technology and Product Development Managers'],
            ['unique_letter' => 'IES', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'IES', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'IES', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'IES', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'IES', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'IES', 'skill' => 'Sustainability Specialists'],
            ['unique_letter' => 'IES', 'skill' => 'Actuaries'],
            ['unique_letter' => 'IES', 'skill' => 'Community Health Workers'],
            ['unique_letter' => 'IES', 'skill' => 'Conservation Scientists'],
            ['unique_letter' => 'IES', 'skill' => 'Foresters'],
            ['unique_letter' => 'IES', 'skill' => 'Range Managers'],
            ['unique_letter' => 'IES', 'skill' => 'Wind Energy Engineers'],
            ['unique_letter' => 'IES', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'IES', 'skill' => 'Sales Engineers'],
            ['unique_letter' => 'IES', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'IES', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'IES', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'IES', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'IES', 'skill' => 'Film and Video Editors'],
            ['unique_letter' => 'IES', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'IES', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'IES', 'skill' => 'News Analysts, Reporters, and Journalists'],
            ['unique_letter' => 'IES', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'IES', 'skill' => 'Climate Change Policy Analysts'],
            ['unique_letter' => 'IES', 'skill' => 'Environmental Economists'],
            ['unique_letter' => 'IES', 'skill' => 'Industrial Ecologists'],
            ['unique_letter' => 'IES', 'skill' => 'Industrial-Organizational Psychologists'],
            ['unique_letter' => 'IES', 'skill' => 'Urban and Regional Planners'],
            ['unique_letter' => 'IES', 'skill' => 'Economists'],
            ['unique_letter' => 'IES', 'skill' => 'Environmental Restoration Planners'],
            ['unique_letter' => 'IES', 'skill' => 'Nanosystems Engineers'],
            ['unique_letter' => 'IES', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'IES', 'skill' => 'Survey Researchers'],
            ['unique_letter' => 'IES', 'skill' => 'Administrative Law Judges, Adjudicators, and Hearing Officers'],
            ['unique_letter' => 'IES', 'skill' => 'Lawyers'],
            ['unique_letter' => 'IES', 'skill' => 'Natural Sciences Managers'],
            ['unique_letter' => 'IES', 'skill' => 'Instructional Coordinators'],
            ['unique_letter' => 'IES', 'skill' => 'Law Teachers, Postsecondary'],
            ['unique_letter' => 'IES', 'skill' => 'Architectural and Engineering Managers'],
            ['unique_letter' => 'IES', 'skill' => 'Chief Sustainability Officers'],
            ['unique_letter' => 'IES', 'skill' => 'Business Teachers, Postsecondary'],
            ['unique_letter' => 'IES', 'skill' => 'Judicial Law Clerks'],
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
