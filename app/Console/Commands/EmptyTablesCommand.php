<?php

namespace App\Console\Commands;

use App\Models\CareerTestResult;
use App\Models\Otp;
use App\Models\Student;
use App\Models\StudentEducation;
use App\Models\StudentPreference;
use App\Models\StudentsBasicDetail;
use App\Models\StudentsContactDetail;
use Illuminate\Console\Command;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\DB;




class EmptyTablesCommand extends Command
{

    protected $signature = 'empty:alldatatable';
    protected $description = 'Empties specified tables';


    public function handle()
    {
        $this->info('Emptying tables...');

        // Disable foreign key checks to avoid constraint violations
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tables in the proper order (consider foreign key constraints)
        // The order might need to be adjusted based on your foreign key relationships
        CareerTestResult::truncate();
        Otp::truncate();
        PersonalAccessToken::truncate();
        StudentsBasicDetail::truncate();
        StudentsContactDetail::truncate();
        StudentEducation::truncate();
        StudentPreference::truncate();
        Student::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->info('Tables emptied successfully!');

        return 0;
    }
}
