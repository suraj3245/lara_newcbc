<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombinationLettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $combinations = [
            ['unique_letter' => 'RIA', 'similar_letters' => 'RIA'],
            ['unique_letter' => 'RIA', 'similar_letters' => 'RAI'],
            ['unique_letter' => 'RIA', 'similar_letters' => 'IRA'],
            ['unique_letter' => 'RIA', 'similar_letters' => 'IAR'],
            ['unique_letter' => 'RIA', 'similar_letters' => 'ARI'],
            ['unique_letter' => 'RIA', 'similar_letters' => 'AIR'],
            ['unique_letter' => 'RIS', 'similar_letters' => 'RIS'],
            ['unique_letter' => 'RIS', 'similar_letters' => 'RSI'],
            ['unique_letter' => 'RIS', 'similar_letters' => 'SIR'],
            ['unique_letter' => 'RIS', 'similar_letters' => 'SRI'],
            ['unique_letter' => 'RIS', 'similar_letters' => 'ISR'],
            ['unique_letter' => 'RIS', 'similar_letters' => 'IRS'],
            ['unique_letter' => 'RIE', 'similar_letters' => 'RIE'],
            ['unique_letter' => 'RIE', 'similar_letters' => 'REI'],
            ['unique_letter' => 'RIE', 'similar_letters' => 'ERI'],
            ['unique_letter' => 'RIE', 'similar_letters' => 'EIR'],
            ['unique_letter' => 'RIE', 'similar_letters' => 'IRE'],
            ['unique_letter' => 'RIE', 'similar_letters' => 'IER'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'RAS'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'RSA'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'SAR'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'SRA'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'ARS'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'ASR'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'RAE'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'REA'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'AER'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'ARE'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'EAR'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'ERA'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'RAC'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'RCA'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'ARC'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'ACR'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'CAR'],
            ['unique_letter' => 'RAS', 'similar_letters' => 'CRA'],
            ['unique_letter' => 'RSE', 'similar_letters' => 'RSE'],
            ['unique_letter' => 'RSE', 'similar_letters' => 'RES'],
            ['unique_letter' => 'RSE', 'similar_letters' => 'ERS'],
            ['unique_letter' => 'RSE', 'similar_letters' => 'ESR'],
            ['unique_letter' => 'RSE', 'similar_letters' => 'SER'],
            ['unique_letter' => 'RSE', 'similar_letters' => 'SRE'],
            ['unique_letter' => 'RCE', 'similar_letters' => 'RCE'],
            ['unique_letter' => 'RCE', 'similar_letters' => 'REC'],
            ['unique_letter' => 'RCE', 'similar_letters' => 'ERC'],
            ['unique_letter' => 'RCE', 'similar_letters' => 'ECR'],
            ['unique_letter' => 'RCE', 'similar_letters' => 'CRE'],
            ['unique_letter' => 'RCE', 'similar_letters' => 'CER'],
            ['unique_letter' => 'RCI', 'similar_letters' => 'RCI'],
            ['unique_letter' => 'RCI', 'similar_letters' => 'RIC'],
            ['unique_letter' => 'RCI', 'similar_letters' => 'CIR'],
            ['unique_letter' => 'RCI', 'similar_letters' => 'CRI'],
            ['unique_letter' => 'RCI', 'similar_letters' => 'ICR'],
            ['unique_letter' => 'RCI', 'similar_letters' => 'IRC'],
            ['unique_letter' => 'ISA', 'similar_letters' => 'ISA'],
            ['unique_letter' => 'ISA', 'similar_letters' => 'IAS'],
            ['unique_letter' => 'ISA', 'similar_letters' => 'ASI'],
            ['unique_letter' => 'ISA', 'similar_letters' => 'AIS'],
            ['unique_letter' => 'ISA', 'similar_letters' => 'SIA'],
            ['unique_letter' => 'ISA', 'similar_letters' => 'SAI'],
            ['unique_letter' => 'ISE', 'similar_letters' => 'ISE'],
            ['unique_letter' => 'IES', 'similar_letters' => 'IES'],
            ['unique_letter' => 'IES', 'similar_letters' => 'SEI'],
            ['unique_letter' => 'IES', 'similar_letters' => 'SIE'],
            ['unique_letter' => 'IES', 'similar_letters' => 'EIS'],
            ['unique_letter' => 'IES', 'similar_letters' => 'ESI'],
            ['unique_letter' => 'IEC', 'similar_letters' => 'IEC'],
            ['unique_letter' => 'ICE', 'similar_letters' => 'ICE'],
            ['unique_letter' => 'ECI', 'similar_letters' => 'ECI'],
            ['unique_letter' => 'EIC', 'similar_letters' => 'EIC'],
            ['unique_letter' => 'CIE', 'similar_letters' => 'CIE'],
            ['unique_letter' => 'CEI', 'similar_letters' => 'CEI'],
            ['unique_letter' => 'IAE', 'similar_letters' => 'IAE'],
            ['unique_letter' => 'IAE', 'similar_letters' => 'IEA'],
            ['unique_letter' => 'AIE', 'similar_letters' => 'AIE'],
            ['unique_letter' => 'AIE', 'similar_letters' => 'AEI'],
            ['unique_letter' => 'AIE', 'similar_letters' => 'EAI'],
            ['unique_letter' => 'AIE', 'similar_letters' => 'EIA'],
            ['unique_letter' => 'AIE', 'similar_letters' => 'IAC'],
            ['unique_letter' => 'ICA', 'similar_letters' => 'ICA'],
            ['unique_letter' => 'ACI', 'similar_letters' => 'ACI'],
            ['unique_letter' => 'AIC', 'similar_letters' => 'AIC'],
            ['unique_letter' => 'CIA', 'similar_letters' => 'CIA'],
            ['unique_letter' => 'CAI', 'similar_letters' => 'CAI'],
            ['unique_letter' => 'SAE', 'similar_letters' => 'SAE'],
            ['unique_letter' => 'SAE', 'similar_letters' => 'SEA'],
            ['unique_letter' => 'SAE', 'similar_letters' => 'AES'],
            ['unique_letter' => 'SAE', 'similar_letters' => 'ASE'],
            ['unique_letter' => 'SAE', 'similar_letters' => 'ESA'],
            ['unique_letter' => 'SAE', 'similar_letters' => 'EAS'],
            ['unique_letter' => 'SAC', 'similar_letters' => 'SAC'],
            ['unique_letter' => 'SAC', 'similar_letters' => 'SCA'],
            ['unique_letter' => 'SAC', 'similar_letters' => 'ACS'],
            ['unique_letter' => 'SAC', 'similar_letters' => 'ASC'],
            ['unique_letter' => 'SAC', 'similar_letters' => 'CSA'],
            ['unique_letter' => 'SAC', 'similar_letters' => 'CAS'],
            ['unique_letter' => 'SEC', 'similar_letters' => 'SEC'],
            ['unique_letter' => 'SEC', 'similar_letters' => 'SCE'],
            ['unique_letter' => 'SEC', 'similar_letters' => 'ECS'],
            ['unique_letter' => 'SEC', 'similar_letters' => 'ESC'],
            ['unique_letter' => 'SEC', 'similar_letters' => 'CSE'],
            ['unique_letter' => 'SEC', 'similar_letters' => 'CES'],
            ['unique_letter' => 'AEC', 'similar_letters' => 'AEC'],
            ['unique_letter' => 'AEC', 'similar_letters' => 'ACE'],
            ['unique_letter' => 'ECA', 'similar_letters' => 'ECA'],
            ['unique_letter' => 'EAC', 'similar_letters' => 'EAC'],
            ['unique_letter' => 'CAE', 'similar_letters' => 'CAE'],
            ['unique_letter' => 'CAE', 'similar_letters' => 'CEA'],
            ['unique_letter' => 'RSC', 'similar_letters' => 'RSC'],
            ['unique_letter' => 'RSC', 'similar_letters' => 'RCS'],
            ['unique_letter' => 'RSC', 'similar_letters' => 'SRC'],
            ['unique_letter' => 'RSC', 'similar_letters' => 'SCR'],
            ['unique_letter' => 'RSC', 'similar_letters' => 'CRS'],
            ['unique_letter' => 'RSC', 'similar_letters' => 'CSR'],
            ['unique_letter' => 'ISC', 'similar_letters' => 'ISC'],
            ['unique_letter' => 'ISC', 'similar_letters' => 'ICS'],
            ['unique_letter' => 'ISC', 'similar_letters' => 'SIC'],
            ['unique_letter' => 'ISC', 'similar_letters' => 'SCI'],
            ['unique_letter' => 'ISC', 'similar_letters' => 'CIS'],
            ['unique_letter' => 'ISC', 'similar_letters' => 'CSI'],
        ];


        foreach ($combinations as $combination) {
            DB::table('career_combination_letters')->updateOrInsert(
                ['similar_letters' => $combination['similar_letters']], // Check if this record exists
                [
                    'unique_letter' => $combination['unique_letter'], // Update or insert this data
                    'similar_letters' => $combination['similar_letters'],
                    // Add other fields if needed
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
