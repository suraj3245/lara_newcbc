<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ECASkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'ECA', 'skill' => 'Advertising Sales Agents'],
            ['unique_letter' => 'ECA', 'skill' => 'Appraisers and Assessors of Real Estate'],
            ['unique_letter' => 'ECA', 'skill' => 'Biofuels Production Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Biomass Power Plant Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Buyers and Purchasing Agents, Farm Products'],
            ['unique_letter' => 'ECA', 'skill' => 'Compensation and Benefits Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Computer and Information Systems Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Financial Examiners'],
            ['unique_letter' => 'ECA', 'skill' => 'Financial Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'First-Line Supervisors of Non-Retail Sales Workers'],
            ['unique_letter' => 'ECA', 'skill' => 'Fundraisers'],
            ['unique_letter' => 'ECA', 'skill' => 'General and Operations Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Human Resources Specialists'],
            ['unique_letter' => 'ECA', 'skill' => 'Industrial Production Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Information Technology Project Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Insurance Sales Agents'],
            ['unique_letter' => 'ECA', 'skill' => 'Labor Relations Specialists'],
            ['unique_letter' => 'ECA', 'skill' => 'Lodging Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Logisticians'],
            ['unique_letter' => 'ECA', 'skill' => 'Loss Prevention Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Marketing Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Media Programming Directors'],
            ['unique_letter' => 'ECA', 'skill' => 'Medical and Health Services Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Meeting, Convention, and Event Planners'],
            ['unique_letter' => 'ECA', 'skill' => 'Online Merchants'],
            ['unique_letter' => 'ECA', 'skill' => 'Personal Financial Advisors'],
            ['unique_letter' => 'ECA', 'skill' => 'Property, Real Estate, and Community Association Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Purchasing Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Quality Control Systems Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Real Estate Brokers'],
            ['unique_letter' => 'ECA', 'skill' => 'Regulatory Affairs Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Sales Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Sales Representatives, Wholesale and Manufacturing, Technical and Scientific Products'],
            ['unique_letter' => 'ECA', 'skill' => 'Securities, Commodities, and Financial Services Sales Agents'],
            ['unique_letter' => 'ECA', 'skill' => 'Supply Chain Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Transportation, Storage, and Distribution Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Wind Energy Development Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Advertising and Promotions Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Brownfield Redevelopment Specialists and Site Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Business Continuity Planners'],
            ['unique_letter' => 'ECA', 'skill' => 'Clinical Research Coordinators'],
            ['unique_letter' => 'ECA', 'skill' => 'Construction Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Credit Counselors'],
            ['unique_letter' => 'ECA', 'skill' => 'Directors, Religious Activities and Education'],
            ['unique_letter' => 'ECA', 'skill' => 'Farmers, Ranchers, and Other Agricultural Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Fraud Examiners, Investigators and Analysts'],
            ['unique_letter' => 'ECA', 'skill' => 'Human Resources Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Media Technical Directors/Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Search Marketing Strategists'],
            ['unique_letter' => 'ECA', 'skill' => 'Writers and Authors'],
            ['unique_letter' => 'ECA', 'skill' => 'Accountants and Auditors'],
            ['unique_letter' => 'ECA', 'skill' => 'Budget Analysts'],
            ['unique_letter' => 'ECA', 'skill' => 'Claims Adjusters, Examiners, and Investigators'],
            ['unique_letter' => 'ECA', 'skill' => 'Compensation, Benefits, and Job Analysis Specialists'],
            ['unique_letter' => 'ECA', 'skill' => 'Compliance Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Cost Estimators'],
            ['unique_letter' => 'ECA', 'skill' => 'Credit Analysts'],
            ['unique_letter' => 'ECA', 'skill' => 'Insurance Underwriters'],
            ['unique_letter' => 'ECA', 'skill' => 'Loan Officers'],
            ['unique_letter' => 'ECA', 'skill' => 'Logistics Analysts'],
            ['unique_letter' => 'ECA', 'skill' => 'Purchasing Agents, Except Wholesale, Retail, and Farm Products'],
            ['unique_letter' => 'ECA', 'skill' => 'Regulatory Affairs Specialists'],
            ['unique_letter' => 'ECA', 'skill' => 'Sales Representatives, Wholesale and Manufacturing, Except Technical and Scientific Products'],
            ['unique_letter' => 'ECA', 'skill' => 'Treasurers and Controllers'],
            ['unique_letter' => 'ECA', 'skill' => 'Web Administrators'],
            ['unique_letter' => 'ECA', 'skill' => 'Business Intelligence Analysts'],
            ['unique_letter' => 'ECA', 'skill' => 'Computer Network Support Specialists'],
            ['unique_letter' => 'ECA', 'skill' => 'Editors'],
            ['unique_letter' => 'ECA', 'skill' => 'Education and Childcare Administrators, Preschool and Daycare'],
            ['unique_letter' => 'ECA', 'skill' => 'Equal Opportunity Representatives and Officers'],
            ['unique_letter' => 'ECA', 'skill' => 'Management Analysts'],
            ['unique_letter' => 'ECA', 'skill' => 'Market Research Analysts and Marketing Specialists'],
            ['unique_letter' => 'ECA', 'skill' => 'Probation Officers and Correctional Treatment Specialists'],
            ['unique_letter' => 'ECA', 'skill' => 'Water Resource Specialists'],
            ['unique_letter' => 'ECA', 'skill' => 'Actuaries'],
            ['unique_letter' => 'ECA', 'skill' => 'Social and Human Service Assistants'],
            ['unique_letter' => 'ECA', 'skill' => 'Computer Network Architects'],
            ['unique_letter' => 'ECA', 'skill' => 'Database Architects'],
            ['unique_letter' => 'ECA', 'skill' => 'Industrial Engineers'],
            ['unique_letter' => 'ECA', 'skill' => 'Intelligence Analysts'],
            ['unique_letter' => 'ECA', 'skill' => 'Transportation Inspectors'],
            ['unique_letter' => 'ECA', 'skill' => 'Chief Executives'],
            ['unique_letter' => 'ECA', 'skill' => 'Chief Sustainability Officers'],
            ['unique_letter' => 'ECA', 'skill' => 'Curators'],
            ['unique_letter' => 'ECA', 'skill' => 'Education Administrators, Postsecondary'],
            ['unique_letter' => 'ECA', 'skill' => 'Investment Fund Managers'],
            ['unique_letter' => 'ECA', 'skill' => 'Clinical Nurse Specialists'],
            ['unique_letter' => 'ECA', 'skill' => 'Education Administrators, Kindergarten through Secondary'],
            ['unique_letter' => 'ECA', 'skill' => 'Judicial Law Clerks'],
            ['unique_letter' => 'ECA', 'skill' => 'Environmental Economists'],
            ['unique_letter' => 'ECA', 'skill' => 'Economists'],
            ['unique_letter' => 'ECA', 'skill' => 'Operations Research Analysts'],
            ['unique_letter' => 'ECA', 'skill' => 'Survey Researchers'],
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
