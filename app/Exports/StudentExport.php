<?php

namespace App\Exports;

use App\Models\Student;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $students = Student::with('careerTestResult')->get();

        $data = [];

        foreach ($students as $student) {
            $rowData = [
                'Name' => $student->name,
                'Email' => $student->email,
                'Phone' => $student->phone,
                'Class' => $student->class,
                'Place' => $student->from,
                'Realistic Score' => $student->careerTestResult->realistic_score ?? '',
                'Investigative Score' => $student->careerTestResult->investigative_score ?? '',
                'Artistic Score' => $student->careerTestResult->artistic_score ?? '',
                'Social Score' => $student->careerTestResult->social_score ?? '',
                'Enterprising Score' => $student->careerTestResult->enterprising_score ?? '',
                'Conventional Score' => $student->careerTestResult->conventional_score ?? '',
                'Magic Link' => 'careerbuddyclub.com/redirect/' . ($student->magic_link_token ?? '')
            ];

            $data[] = $rowData;
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'Class',
            'Place',
            'Realistic Score',
            'Investigative Score',
            'Artistic Score',
            'Social Score',
            'Enterprising Score',
            'Conventional Score',
            'magic link',
        ];
    }
}
