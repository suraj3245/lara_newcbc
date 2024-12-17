<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudentExport;
use App\Http\Controllers\Controller;
use App\Imports\CareerTestResultsImport;
use App\Imports\StudentsAndTestResultsImport;
use App\Imports\StudentsImport;
use App\Mail\TestResultMagicLinkMail;
use App\Models\CareerTestResult;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('careerTestResult')->paginate(25);
        return view('Admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'nullable|email|unique:students,email',
            'mobile' => 'nullable',
            'class' => 'nullable',
            'from' => 'nullable|string',
            'realistic_score' => 'required|integer',
            'investigative_score' => 'required|integer',
            'artistic_score' => 'required|integer',
            'social_score' => 'required|integer',
            'enterprising_score' => 'required|integer',
            'conventional_score' => 'required|integer',
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Create a new student instance and save it to the database
            $student = new Student([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'class' => $request->class,
                'from' => $request->from,
            ]);
            $student->save();

            // Create a new career test result instance and save it to the database
            $careerTestResult = new CareerTestResult([
                'user_id' => $student->id,
                'realistic_score' => $request->realistic_score,
                'investigative_score' => $request->investigative_score,
                'artistic_score' => $request->artistic_score,
                'social_score' => $request->social_score,
                'enterprising_score' => $request->enterprising_score,
                'conventional_score' => $request->conventional_score,
            ]);
            $careerTestResult->save();
            $postData = [
                "AuthToken" => "CBCLUB-29-12-2023",
                "Source" => "cbclub",
                "FirstName" => $request->name,
                "Email" => $request->email,
                "MobileNumber" => $request->mobile,
                "LeadSource" => "1958",
                "LeadCampaign" => "Admin", //website: Website Query, Admin: CAT 2024
                "LeadChannel" => "36",
                "Course" => $request->input('Course'), //Level
                "Center" => "1",
                "Field13" => $request->input('stream'), //Stream
            ];

            // Call the function with the data
            $ExtraEdgPush = $this->extraaEdgePushBasicData($postData);

            // Send email with the test result
            $magicLinkToken = Str::random(60);
            $student->magic_link_token = $magicLinkToken;
            $student->save();

            // Mail::to($student->email)->send(new TestResultMagicLinkMail($student, $careerTestResult, $magicLinkToken));
            // $this->sendWhatsAppMessage($student->mobile, $student->name, $student->magic_link_token);
            // Redirect with success message
            return redirect()->route('students.index')->with('success', 'Student created successfully.');
        } catch (\Exception $e) {
            Log::error('Error during student creation: ' . $e->getMessage());
            // Redirect with error message
            return redirect()->route('students.index')->with('error', 'Failed to create student.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::with('careerTestResult')->findOrFail($id);


        return view('Admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'class' => 'required|integer',
            'from' => 'nullable|string',
            'realistic_score' => 'required|integer',
            'investigative_score' => 'required|integer',
            'artistic_score' => 'required|integer',
            'social_score' => 'required|integer',
            'enterprising_score' => 'required|integer',
            'conventional_score' => 'required|integer',
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            // Find the student by ID
            $student = Student::findOrFail($id);

            // Update student details
            $student->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'class' => $request->input('class'),
                'from' => $request->input('from'),
            ]);

            // Check if the student has associated career test results
            if ($student->careerTestResult) {
                // Update career test results
                $student->careerTestResult->update([
                    'realistic_score' => $request->input('realistic_score'),
                    // Update other test scores similarly
                ]);
            } else {
                // Create new career test results if they don't exist
                CareerTestResult::create([
                    'user_id' => $student->id,
                    'realistic_score' => $request->input('realistic_score'),
                    // Add other test scores similarly
                ]);
            }

            // Redirect back with success message
            return redirect()->route('students.index')->with('success', 'Student details updated successfully.');
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Error updating student details: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to update student details.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            // Find the student by ID
            $student = Student::findOrFail($id);

            // Delete associated career test results if they exist
            if ($student->careerTestResult) {
                $student->careerTestResult->delete();
            }

            // Now delete the student
            $student->delete();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Student and associated data deleted successfully.');
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Error deleting student and associated data: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to delete student and associated data.');
        }
    }
    public function showImportForm()
    {


        return view('Admin.students.import');
    }

    public function importUsers(Request $request)
    {


        $request->validate([
            'file' => 'required|mimes:xlsx,csv',

        ]);
        session()->forget('validationErrors');
        $import = new StudentsAndTestResultsImport();
        // Excel::import($import, $request->file('file'));
        // Import student details
        Excel::import($import, $request->file('file'));
        $validationErrors = $import->validationErrors;

        if (!empty($validationErrors)) {
            session()->put('validationErrors', $validationErrors);
            return redirect()->route('students.index')->with('error', 'Some rows contain validation errors.');
        }

        // Import career test results

        return redirect()->route('students.index')->with('success', 'Users imported successfully.');
    }

    public function export()
    {
        return Excel::download(new StudentExport, 'students_and_career_test_results.xlsx');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Query the students table
        $students = Student::query();

        // Check if a search term is provided
        if ($searchTerm) {
            // Apply search conditions to the query
            $students->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%')
                ->orWhere('mobile', 'like', '%' . $searchTerm . '%')
                ->orWhere('from', 'like', '%' . $searchTerm . '%');
        }

        // Execute the query and paginate the results
        $students = $students->paginate(25);

        // Pass the results to the view
        return view('Admin.students.index', compact('students'));
    }

    protected function sendWhatsAppMessage($mobile, $studentName, $magicLinkToken)
    {
        $mobile = '+91' . $mobile;


        // Replace with your Exotel API credentials
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
                            "to" => $mobile,
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
                                                    "text" => "$studentName"
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

        return $response;
    }

    private function extraaEdgePushBasicData($data)
    {
        $curl = curl_init();

        // Convert the data array to JSON string
        $jsonData = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://thirdpartyapi.extraaedge.com/api/SaveRequest',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
