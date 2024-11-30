<?php

namespace Database\Seeders;

use App\Models\CareerCombinationSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RCESkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsWithUniqueLetter = [
            ['unique_letter' => 'RCE', 'skill' => 'Transportation Inspectors'],
            ['unique_letter' => 'RCE', 'skill' => 'Computer Network Support Specialists'],
            ['unique_letter' => 'RCE', 'skill' => 'Construction Managers'],
            ['unique_letter' => 'RCE', 'skill' => 'Farmers, Ranchers, and Other Agricultural Managers'],
            ['unique_letter' => 'RCE', 'skill' => 'Media Technical Directors/Managers'],
            ['unique_letter' => 'RCE', 'skill' => 'Compliance Managers'],
            ['unique_letter' => 'RCE', 'skill' => 'Appraisers and Assessors of Real Estate'],
            ['unique_letter' => 'RCE', 'skill' => 'Biofuels Production Managers'],
            ['unique_letter' => 'RCE', 'skill' => 'Biomass Power Plant Managers'],
            ['unique_letter' => 'RCE', 'skill' => 'Buyers and Purchasing Agents, Farm Products'],
            ['unique_letter' => 'RCE', 'skill' => 'Online Merchants'],
            ['unique_letter' => 'RCE', 'skill' => 'Quality Control Systems Managers'],
            ['unique_letter' => 'RCE', 'skill' => 'Transportation, Storage, and Distribution Managers'],
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
