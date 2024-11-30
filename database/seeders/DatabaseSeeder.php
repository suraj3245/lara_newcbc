<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ACISkillsSeeder::class,
            AECSkillsSeeder::class,
            AICSkillsSeeder::class,
            AIESkillsSeeder::class,
            CAESkillsSeeder::class,
            CAISkillsSeeder::class,
            CareerQuestionsSeeder::class,
            CEISkillsSeeder::class,
            CIASkillsSeeder::class,
            CIESkillsSeeder::class,
            CombinationLettersSeeder::class,
            EACSkillsSeeder::class,
            ECASkillsSeeder::class,
            ECISkillsSeeder::class,
            EICSkillsSeeder::class,
            IAESkillsSeeder::class,
            ICASkillsSeeder::class,
            ICESkillsSeeder::class,
            IECSkillsSeeder::class,
            IESSkillsSeeder::class,
            ISASkillsSeeder::class,
            ISCSkillsSeeder::class,
            ISESkillsSeeder::class,
            RASSkillsSeeder::class,
            RCESkillsSeeder::class,
            RCISkillsSeeder::class,
            RIASkillsSeeder::class,
            RIESkillsSeeder::class,
            RISSkillsSeeder::class,
            RSCSkillsSeeder::class,
            RSESkillsSeeder::class,
            SACSkillsSeeder::class,
            SAESkillsSeeder::class,
            SECSkillsSeeder::class,
            StreamSeeder::class,
            LevelSeeder::class,
            AdminUserSeeder::class,
            MenuSeeder::class,
        ]);
    }
}
