<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $colleges = [
            [
                'college_full_name' => 'Guru Nanak College of Pharmaceutical & Paramedical Sciences',
                'college_short_name' => 'GNC',
                'type' => 'Private',
                'approved_by' => 'Education Board',
                'established_year' => 2000,
                'about' => 'gnc college',
                'address' => 'Jhajhra, Chakrata Rd, Dehradun, Uttarakhand 248007',
                'phone' => '7300900909',
                'email' => 'info@gncdehradun.com',
                'website' => 'https://www.gncdehradun.com',
                'city' => 'Dehradun'
            ],
            [
                'college_full_name' => 'University of Petroleum and Energy Studies',
                'college_short_name' => 'UPES',
                'type' => 'Private',
                'approved_by' => 'Education Board',
                'established_year' => 2000,
                'about' => 'UPES college',
                'address' => 'Dehradun',
                'phone' => '0123456789',
                'email' => 'info@example.com',
                'website' => 'https://www.example.com',
                'city' => 'Dehradun'
            ],
            [
                'college_full_name' => 'Baba Farid Institute of Technology',
                'college_short_name' => 'BFIT',
                'type' => 'Private',
                'approved_by' => 'Education Board',
                'established_year' => 2000,
                'about' => 'BFIT college',
                'address' => 'Dehradun',
                'phone' => '0123456789',
                'email' => 'info@bfitdehradun.com',
                'website' => 'https://www.example.com',
                'city' => 'Dehradun'
            ],
            [
                'college_full_name' => 'Doon Business School',
                'college_short_name' => 'DBS',
                'type' => 'Private',
                'approved_by' => 'Education Board',
                'established_year' => 2000,
                'about' => 'DBS college',
                'address' => 'Dehradun',
                'phone' => '0123456789',
                'email' => 'info@dbs.com',
                'website' => 'https://www.example.com',
                'city' => 'Dehradun'
            ],
        ];

        DB::table('colleges')->insert($colleges);
    }
}
