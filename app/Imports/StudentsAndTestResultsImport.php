<?php

namespace App\Imports;

use App\Mail\TestResultMagicLinkMail;
use App\Models\Student;
use App\Models\CareerTestResult;
use App\Mail\TestResultMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StudentsAndTestResultsImport implements ToModel, WithHeadingRow
{
    public $validationErrors = [];

    public function model(array $row)
    {
        try {

            // Validate the student data
            $validator = Validator::make($row, [
                'name' => 'required|string',
                'email' => 'required|email|unique:students,email',
                'mobile' => 'required|numeric',
                'class' => 'nullable',
                'place' => 'nullable',
                // Add more validation rules as needed
            ]);

            // Check if student data is valid
            if ($validator->fails()) {
                $this->validationErrors[] = [
                    'row' => $row,
                    'errors' => $validator->errors()->all(),
                ];
                return null; // Skip saving this row to the database
            }

            // Create a new student instance
            $student = new Student([
                'name' => $row['name'],
                'email' => $row['email'],
                'mobile' => $row['mobile'],
                'class' => $row['class'],
                'from' => $row['place'],
                // Add more fields as needed
            ]);
            $mobileWithCountryCode = '+91' . $row['mobile'];

            // Save the student instance to the database
            $student->save();

            // Create a new career test result instance
            $testResult = new CareerTestResult([
                'user_id' => $student->id, // Assuming student id is used for user_id
                'realistic_score' => $row['realistic_score'],
                'investigative_score' => $row['investigative_score'],
                'artistic_score' => $row['artistic_score'],
                'social_score' => $row['social_score'],
                'enterprising_score' => $row['enterprising_score'],
                'conventional_score' => $row['conventional_score'],
                // Add more fields as needed
            ]);

            // Save the test result instance to the database
            $testResult->save();

            $magicLinkToken = Str::random(60);
            $student->magic_link_token = $magicLinkToken;
            $student->save();


            // Generate a magic link token
            // Example method to create a token
            Log::info('Importing data: ' . json_encode($row)); // Log the imported row data
            // Example log message
            Log::info('Successfully imported student: ' . $student->name);

            // // Send an email with the test result
            Mail::to($student->email)->send(new TestResultMagicLinkMail($student, $testResult, $magicLinkToken));
            $exotelAuthToken = 'MjI5MDRjZWUyNGJhZGU1NWI2MjcwOGFlYjhhMWFjNTJhNzIzZWJiM2QzOTViYzA3OjU2YzUzN2Y1OGUyNGU3ZmU5NTczM2FiNWRhNDJjZjcxNmE1NzFmNzFmZDY2NjUzNg==';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.exotel.com/v2/accounts/theextraaedge3/messages',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode(array(
                    "custom_data" => "order12",
                    "status_callback" => "https://01j1h8rfjwz80dtsdr48bxb0j100-1c48996e306c9a390b44.requestinspector.com",
                    "whatsapp" => array(
                        "messages" => array(
                            array(
                                "from" => "+917456000100",
                                "to" => $mobileWithCountryCode,
                                "content" => array(
                                    "type" => "template",
                                    "template" => array(
                                        "name" => "offline_cat",
                                        "language" => array(
                                            "policy" => "deterministic",
                                            "code" => "en"
                                        ),
                                        "components" => array(
                                            array(
                                                "type" => "header",
                                                "parameters" => array(
                                                    array(
                                                        "type" => "image",
                                                        "image" => array(
                                                            "link" => "https://gnc.edu.in/upload/mailer/banner1.png"
                                                        )
                                                    )
                                                )
                                            ),
                                            array(
                                                "type" => "body",
                                                "parameters" => array(
                                                    array(
                                                        "type" => "text",
                                                        "text" => "$student->name"
                                                    )
                                                )
                                            ),

                                            array(
                                                "type" => "button",
                                                "sub_type" => "url",
                                                "index" => "1",
                                                "parameters" => array(
                                                    array(
                                                        "type" => "text",
                                                        "text" => "/$magicLinkToken"
                                                    )
                                                )
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    )
                )),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Basic ' . $exotelAuthToken
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
        } catch (\Exception $e) {
            Log::error('Error during import: ' . $e->getMessage());
        }
    }
}
