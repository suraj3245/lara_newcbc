<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SECSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skillsWithUniqueLetter = [
            ['unique_letter' => 'SEC', 'skill' => 'Education and Childcare Administrators, Preschool and Daycare'],
            ['unique_letter' => 'SEC', 'skill' => 'Equal Opportunity Representatives and Officers'],
            ['unique_letter' => 'SEC', 'skill' => 'Probation Officers and Correctional Treatment Specialists'],
            ['unique_letter' => 'SEC', 'skill' => 'Credit Counselors'],
            ['unique_letter' => 'SEC', 'skill' => 'Directors, Religious Activities and Education'],
            ['unique_letter' => 'SEC', 'skill' => 'Human Resources Managers'],
            ['unique_letter' => 'SEC', 'skill' => 'Social and Human Service Assistants'],
            ['unique_letter' => 'SEC', 'skill' => 'Compensation and Benefits Managers'],
            ['unique_letter' => 'SEC', 'skill' => 'Financial Managers'],
            ['unique_letter' => 'SEC', 'skill' => 'First-Line Supervisors of Non-Retail Sales Workers'],
            ['unique_letter' => 'SEC', 'skill' => 'General and Operations Managers'],
            ['unique_letter' => 'SEC', 'skill' => 'Human Resources Specialists'],
            ['unique_letter' => 'SEC', 'skill' => 'Insurance Sales Agents'],
            ['unique_letter' => 'SEC', 'skill' => 'Labor Relations Specialists'],
            ['unique_letter' => 'SEC', 'skill' => 'Lodging Managers'],
            ['unique_letter' => 'SEC', 'skill' => 'Medical and Health Services Managers'],
            ['unique_letter' => 'SEC', 'skill' => 'Meeting, Convention, and Event Planners'],
            ['unique_letter' => 'SEC', 'skill' => 'Personal Financial Advisors'],
            ['unique_letter' => 'SEC', 'skill' => 'Securities, Commodities, and Financial Services Sales Agents'],
            ['unique_letter' => 'SEC', 'skill' => 'Loan Officers'],
            ['unique_letter' => 'SEC', 'skill' => 'Clinical Nurse Specialists'],
            ['unique_letter' => 'SEC', 'skill' => 'Education Administrators, Kindergarten through Secondary'],
            ['unique_letter' => 'SEC', 'skill' => 'Education Administrators, Postsecondary'],
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
