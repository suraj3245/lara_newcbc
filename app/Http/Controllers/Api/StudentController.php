<?php
namespace App\Http\Controllers\Api;
use App\Exports\StudentExport;
use App\Imports\CareerTestResultsImport;
use App\Imports\StudentsAndTestResultsImport;
use App\Imports\StudentsImport;
use App\Http\Controllers\Controller;
use App\Mail\MagicLinkEmail;
use App\Models\CareerCombinationLetter;
use App\Models\CareerCombinationSkill;
use App\Models\CareerQuestion;
use App\Models\CareerTestResult;
use App\Models\College;
use App\Models\CollegeCourse;
use App\Models\ContactCollege;
use App\Models\ContactSchool;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\DocumentAttachment;
use App\Models\Level;
use App\Models\Otp;
use App\Models\ScheduleCounselorsCall;
use App\Models\Specialization;
use App\Models\Stream;
use App\Models\Student;
use App\Models\StudentEducation;
use App\Models\StudentPreference;
use App\Models\StudentsBasicDetail;
use App\Models\StudentsContactDetail;
use App\Models\school;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use App\Mail\TestResultMagicLinkMail;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming request data including the new fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:students',
            'password' => 'nullable|min:6',
            'from' => 'nullable',
            'otp' => 'required|min:4|max:4',
            'mobile' => 'required|unique:students|digits_between:10,15',
            'stream' => 'required', // New field
            'level' => 'required', // New field
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Extract the validated data
        $validatedData = $validator->validated();

        // Hash the password
        $validatedData['password'] = Hash::make($request->password);

        // Create the student record in the database
        $student = Student::create($validatedData);

        // Save preference details with student id
        $preferenceData = [
            'student_id' => $student->id, // Add student ID
            'stream' => $request->stream,
            'level' => $request->level,
        ];
        StudentPreference::create($preferenceData);

        $postData = [
            "AuthToken" => "CBCLUB-29-12-2023",
            "Source" => "cbclub",
            "FirstName" => $request->input('name'),
            "Email" => $request->input('email'),
            "MobileNumber" => $request->input('mobile'),
            "LeadSource" => "1958",
            "LeadCampaign" => $request->input('LeadCampaign'), //website: Website Query, Admin: CAT 2024
            "LeadChannel" => "36",
            "Course" => $request->input('Course'), //Level
            "Center" => "1",
            "Field13" => $request->input('stream'), //Stream
        ];

        // Call the function with the data
        $ExtraEdgPush = $this->extraaEdgePushBasicData($postData);

        // Generate a token for the student using Sanctum
        $token = $student->createToken('auth_token')->plainTextToken;

        // Return the access token in the response
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function registerdbs(Request $request)
{
    try {
        // Validate the incoming request data for email, mobile, and full name
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:students',
            'mobile' => 'required|unique:students|digits_between:10,15',
            'password' => 'nullable|min:6',
            'from' => 'nullable',
            'otp' => 'nullable|min:4|max:4',
            'stream' => 'nullable', // Stream is now nullable
            'level' => 'nullable', // Level is now nullable
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Extract the validated data
        $validatedData = $validator->validated();

        // Optionally set a default value for password, or handle the password later
        $validatedData['password'] = Hash::make('defaultpassword');

        // Create the student record in the database with the full name
        $student = Student::create($validatedData);

        // Prepare the data to send to the external service
        $postData = [
            "AuthToken" => "CBCLUB-29-12-2023",
            "Source" => "cbclub",
            "FirstName" => $request->input('full_name'), // Using full name
            "Email" => $request->input('email'),
            "MobileNumber" => $request->input('mobile'),
            "LeadSource" => "1958",
            "LeadChannel" => "36",
            "Center" => "1",
            "LeadCampaign" => $request->input('utm_campaign'), // LeadCampaign, which can be null
            "Field13" => $request->input('stream'), // Stream, can be null
            "Course" => $request->input('level'), // Level, can be null
        ];

        // Call the external service function with the data
        $ExtraEdgPush = $this->extraaEdgePushBasicData($postData);

        // Check if the external service call was successful
        if (!$ExtraEdgPush) {
            throw new \Exception('Failed to push data to external service.');
        }

        // Generate a token for the student using Sanctum
        $token = $student->createToken('auth_token')->plainTextToken;

        // Return the access token in the response
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('RegisterDBS Error: ' . $e->getMessage());

        return response()->json(['error' => 'Something went wrong! Please try again later.'], 500);
    }
}

    
    public function getstudentstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'mobile' => 'required|string|unique:students,mobile',
            'from' => 'nullable|string',
            'realistic_score' => 'nullable|integer',
            'investigative_score' => 'nullable|integer',
            'artistic_score' => 'nullable|integer',
            'social_score' => 'nullable|integer',
            'enterprising_score' => 'nullable|integer',
            'conventional_score' => 'nullable|integer',
        ]);

        // If validation fails, return response with errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create a new student instance and save it to the database
            $student = new Student([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
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
            // $careerTestResult->save();

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

            try {
                Mail::to($student->email)->send(new TestResultMagicLinkMail($student, $careerTestResult, $magicLinkToken));
                $this->sendWhatsAppMessage($student->mobile, $student->name, $student->magic_link_token);
            } catch (\Exception $e) {
                Log::error('Error sending email or WhatsApp message: ' . $e->getMessage());
                // You can choose to notify the user that the email sending failed, but student creation succeeded
            }

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Student created successfully.',
                'data' => $student
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error during student creation: ' . $e->getMessage());

            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to create student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




    public function getWhatsAppOtp(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'mobile' => 'required|digits_between:10,15',
            'country_code' => 'required|digits_between:1,4',
            'name' => 'required|string|max:255',
        ]);

        // Generate a 4-digit OTP
        $otpCode = $this->generateOtp();

        // Save the OTP to the database
        Otp::create([
            'mobile' => $request->mobile,
            'otp' => $otpCode,
            'type' => 'WhatsApp',
            'expires_at' => now()->addMinutes(10)
        ]);

        // Send OTP via WhatsApp
        return $this->sendOtpViaWhatsApp($request->country_code, $request->mobile, $request->name, $otpCode);
    }

    private function generateOtp()
    {
        return rand(1000, 9999);
    }



    //school

    public function registerschool(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'School_name' => 'required|max:255',
            'School_email' => 'required|email|max:255|unique:schools',
            'School_password' => 'nullable|min:6',
            'School_mobile' => 'required|unique:schools|digits_between:10,15',
            'otp' => 'required|min:4|max:4',
            'api_token' => 'nullable|max:80',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Extract the validated data
        $validatedData = $validator->validated();

        // Hash the password
        $validatedData['School_password'] = Hash::make($request->School_password);

        // Create the school record in the database
        $school = School::create($validatedData);

        // Log the school object for debugging
        // Log::info('School registered: ', ['school' => $school]);

        // Generate a token for the school using Sanctum
        $token = $school->createToken('auth_token')->plainTextToken;

        // Return the access token and school data in the response
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'school' => $school,
        ]);
    }

    public function loginschool(Request $request)
    {
        // Validate the request
        $request->validate([
            'School_email' => 'required|email',
            'School_password' => 'required',
        ]);

        // Find the school by email
        $school = School::where('School_email', $request->School_email)->first();

        // Check if the school exists and the password is correct
        if (!$school || !Hash::check($request->School_password, $school->School_password)) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        // Generate a token for the school using Sanctum
        $token = $school->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'school' => $school,
        ]);
    }

    public function setPasswordSchool(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'School_email' => 'required|email',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
            'token' => "required"
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Extract the validated data
        $validatedData = $validator->validated();

        // Find the school by email
        $school = School::where('School_email', $request->School_email)->first();

        // Check if the school exists
        if (!$school) {
            return response()->json(['message' => 'School not found'], 404);
        }

        // Hash the new password
        $school->School_password = Hash::make($request->new_password);

        // Save the new password to the database
        $school->save();

        // Return a success message
        return response()->json(['message' => 'Password updated successfully']);
    }


    public function UpdateSchoolDetails(Request $request)
    {
        // Assuming you're using Sanctum for API authentication
        $schoolId = Auth::guard('api')->id();

        $validator = Validator::make($request->all(), [
            'School_mobile' => 'required|string|digits_between:10,15',
            'School_email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $school = School::find($schoolId);
        if ($school) {
            $school->School_mobile = $validated['School_mobile'];
            $school->School_email = $validated['School_email'];
            $school->address = $validated['address'];
            $school->city = $validated['city'];
            $school->state = $validated['state'];
            $school->save();

            return response()->json([
                'message' => 'School details updated successfully.',
            ], 200);
        }

        return response()->json([
            'message' => 'School not found.',
        ], 404);
    }


    public function loginWithPhonewpOtpSendSchool(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'School_mobile' => 'required|digits_between:10,15',
            'country_code' => 'required|digits_between:1,4',
        ]);

        // Fetch the school's data from the database using the mobile number
        $school = School::where('School_mobile', $request->School_mobile)->first();

        // Check if the school exists
        if (!$school) {
            // Return an error response if school does not exist
            return response()->json(['error' => 'School not found'], 404);
        }

        // Generate a 4-digit OTP
        $otpCode = $this->generateOtp();

        // Save the OTP to the database
        Otp::create([
            'mobile' => $request->School_mobile,
            'otp' => $otpCode,
            'type' => 'WhatsApp',
            'expires_at' => now()->addMinutes(10)
        ]);

        // Send OTP via WhatsApp
        return $this->sendOtpViaWhatsApp($request->country_code, $request->School_mobile, $school->School_name, $otpCode);
    }

    public function loginWithPhoneschool(Request $request)
    {
        // Validate the request
        $request->validate([
            'School_mobile' => 'required|digits_between:10,15',
            'otp' => 'required|digits:4',
        ]);

        // Find the school by mobile
        $school = School::where('School_mobile', $request->School_mobile)->first();

        // Check if the school exists
        if (!$school) {
            return response()->json(['message' => 'Mobile number not found'], 404);
        }

        // Check if OTP is correct and not expired
        $otpRecord = Otp::where('mobile', $request->School_mobile)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$otpRecord) {
            return response()->json(['message' => 'Invalid or expired OTP'], 401);
        }

        // Generate a token for the school using Sanctum
        $token = $school->createToken('auth_token')->plainTextToken;

        // Return the access token in the response
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'details' => $school
        ]);
    }

    private function sendOtpViaWhatsApp($countryCode, $mobile, $name, $otpCode)
    {
        $curl = curl_init();

        $data = array(
            "custom_data" => "order12",
            "status_callback" => "https://01j1c24fwhx2x75jpszztmqbrj00-91e5dcf598b618112a3e.requestinspector.com",
            "whatsapp" => array(
                "messages" => array(
                    array(
                        "from" => "+917456000100",
                        "to" => $countryCode . $mobile,
                        "content" => array(
                            "type" => "template",
                            "template" => array(
                                "name" => "otp_registration",
                                "language" => array(
                                    "policy" => "deterministic",
                                    "code" => "en"
                                ),
                                "components" => array(
                                    array(
                                        "type" => "body",
                                        "parameters" => array(
                                            array(
                                                "type" => "text",
                                                "text" => "$name"
                                            ),
                                            array(
                                                "type" => "text",
                                                "text" => "$otpCode"
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    )
                )
            )
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://theextraaedge3:51c838d8b65bd550eb543ff5f0126f3a54a89709@api.exotel.com/v2/accounts/theextraaedge3/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $curlError = curl_error($curl);  // Capture curl error if any
        curl_close($curl);

        if ($response === false) {
            return 'Curl error: ' . $curlError;
        }

        return $response;
    }


    
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

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Student and associated data deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Error deleting student and associated data: ' . $e->getMessage());

            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete student and associated data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'from' => 'nullable|string',
            // 'realistic_score' => 'nullable|integer',
            // 'investigative_score' => 'required|integer',
            // 'artistic_score' => 'required|integer',
            // 'social_score' => 'required|integer',
            // 'enterprising_score' => 'required|integer',
            // 'conventional_score' => 'required|integer',
        ]);

        // If validation fails, return response with errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Find the student by ID
            $student = Student::findOrFail($id);

            // Update student details
            $student->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'from' => $request->input('from'),
            ]);

            // Check if the student has associated career test results
            // if ($student->careerTestResult) {
            //     // Update career test results
            //     $student->careerTestResult->update([
            //         'realistic_score' => $request->input('realistic_score'),
            //         'investigative_score' => $request->input('investigative_score'),
            //         'artistic_score' => $request->input('artistic_score'),
            //         'social_score' => $request->input('social_score'),
            //         'enterprising_score' => $request->input('enterprising_score'),
            //         'conventional_score' => $request->input('conventional_score'),
            //     ]);
            // } else {
            //     // Create new career test results if they don't exist
            //     CareerTestResult::create([
            //         'user_id' => $student->id,
            //         'realistic_score' => $request->input('realistic_score'),
            //         'investigative_score' => $request->input('investigative_score'),
            //         'artistic_score' => $request->input('artistic_score'),
            //         'social_score' => $request->input('social_score'),
            //         'enterprising_score' => $request->input('enterprising_score'),
            //         'conventional_score' => $request->input('conventional_score'),
            //     ]);
            // }

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Student details updated successfully.',
                'data' => $student
            ], 200);
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Error updating student details: ' . $e->getMessage());

            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to update student details.',
                'error' => $e->getMessage()
            ], 500);
        }
    }






    // private function buildWhatsAppPayload($countryCode, $mobile, $name, $otpCode)
    // {
    //     return [
    //         "countryCode" => $countryCode,
    //         "phoneNumber" => $mobile,
    //         "callbackData" => "some text here",
    //         "type" => "Template",
    //         "template" => [
    //             "name" => "cbc_registration_otp",
    //             "languageCode" => "en",
    //             "bodyValues" => [$name, $otpCode] // Use the name in the message
    //         ]
    //     ];
    // }


    public function loginWithPhonewpOtpSend(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'mobile' => 'required|digits_between:10,15',
            'country_code' => 'required|digits_between:1,4',
        ]);

        // Fetch the student's data from the database using the mobile number
        $student = Student::where('mobile', $request->mobile)->first();

        // Check if the student exists
        if (!$student) {
            // Return an error response if student does not exist
            return response()->json(['error' => 'User not found'], 404);
        }

        // Generate a 4-digit OTP
        $otpCode = $this->generateOtp();

        // Save the OTP to the database
        Otp::create([
            'mobile' => $request->mobile,
            'otp' => $otpCode,
            'type' => 'WhatsApp',
            'expires_at' => now()->addMinutes(10)
        ]);

        // Send OTP via WhatsApp
        return $this->sendOtpViaWhatsApp($request->country_code, $request->mobile, $student->name, $otpCode);
    }


    public function loginWithPhone(Request $request)
    {
        // Validate the request
        $request->validate([
            'mobile' => 'required|digits_between:10,15',
            // 'country_code' => 'required|digits_between:1,4',
            'otp' => 'required|digits:4',
        ]);


        // Find the student by mobile
        $student = Student::where('mobile', $request->mobile)->first();


        // Check if the student exists
        if (!$student) {
            return response()->json(['message' => 'Mobile number not found'], 404);
        }

        // Check if OTP is correct and not expired
        $otpRecord = Otp::where('mobile', $request->mobile)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$otpRecord) {
            return response()->json(['message' => 'Invalid or expired OTP'], 401);
        }

        // Generate a token for the student using Sanctum
        $token = $student->createToken('auth_token')->plainTextToken;

        // Return the access token in the response
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }


    public function setPassword(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Get the ID of the currently authenticated student
        $userId = Auth::guard('api')->id();

        // Find the authenticated student
        $student = Student::find($userId);

        // Check if student exists
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        // Update the student's password
        $student->password = Hash::make($request->new_password);
        $student->save();

        // Return a success response
        return response()->json(['message' => 'Password successfully set']);
    }



    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the student by email
        $student = Student::where('email', $request->email)->first();


        // Check if the student exists and the password is correct
        if (!$student || !Hash::check($request->password, $student->password)) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        // Generate a token for the student using Sanctum
        $token = $student->createToken('auth_token')->plainTextToken;

        // Return the access token in the response
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }



    public function requestMagicLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $student = Student::where('email', $request->email)->first();
        if (!$student) {
            return response()->json(['message' => 'Email not found'], 404);
        }

        $token = Str::random(60);
        $student->magic_link_token = $token;
        $student->save();

        // $magicLink = url('/' . $token); // Updated to shorter URL format
        $magicLink = "https://careerbuddyclub.com/redirect/" . $token; // Updated to shorter URL format
        Mail::to($student->email)->send(new MagicLinkEmail($magicLink));

        return response()->json(['message' => 'Magic link sent.']);
    }

    public function magicLinkLogin($token)
    {
        $student = Student::where('magic_link_token', $token)->first();

        if (!$student) {
            return response()->json(['message' => 'Invalid or expired token'], 401);
        }

        // $student->magic_link_token = null;
        // $student->save();

        $apiToken = $student->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $apiToken, 'token_type' => 'Bearer']);
    }


    public function magicLinkLoginPostMethod(Request $request)
    {
        $request->validate([
            'magic_link_token' => 'required|string',
        ]);

        $token = $request->input('magic_link_token');
        $student = Student::where('magic_link_token', $token)->first();

        if (!$student) {
            return response()->json(['message' => 'Invalid or expired token'], 401);
        }

        // $student->magic_link_token = null;
        // $student->save();

        $apiToken = $student->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $apiToken, 'token_type' => 'Bearer']);
    }



    public function getAllCATQuestions(Request $request)
    {
        $type = $request->input('type'); // Get the 'type' parameter from the request

        // Query the CareerQuestion model based on the 'type' parameter
        $query = CareerQuestion::query()->select('id', 'question', 'type');

        if (!empty($type)) {
            $query->where('type', $type);
        }

        $questions = $query->get();

        return response()->json($questions);
    }

    public function submitCATAnswers(Request $request)
    {

        $userId = Auth::guard('api')->id();
        $answers = $request->input('answers');

        // Check if userId and answers are provided
        if (!$userId || !is_array($answers)) {
            return response()->json(['error' => 'User ID and answers are required'], 400);
        }

        // Initialize score sums
        $scoreSums = [
            'R' => 0,
            'I' => 0,
            'A' => 0,
            'S' => 0,
            'E' => 0,
            'C' => 0
        ];

        // Calculate the scores
        foreach ($answers as $item) {
            if (isset($item['type'], $item['score']) && array_key_exists($item['type'], $scoreSums)) {
                $scoreSums[$item['type']] += $item['score'];
            }
        }

        // Sort the scores in descending order
        arsort($scoreSums);

        try {
            $userExists = Student::findOrFail($userId);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User not found'], 404);
        }

        CareerTestResult::updateOrCreate(
            ['user_id' => $userId],
            [
                'realistic_score' => $scoreSums['R'],
                'investigative_score' => $scoreSums['I'],
                'artistic_score' => $scoreSums['A'],
                'social_score' => $scoreSums['S'],
                'enterprising_score' => $scoreSums['E'],
                'conventional_score' => $scoreSums['C']
            ]
        );

        return response()->json($scoreSums);
    }


    public function getCATResult(Request $request)
    {
        $studentId = Auth::guard('api')->id();

        $results = CareerTestResult::where('user_id', $studentId)
            ->select('realistic_score', 'investigative_score', 'artistic_score', 'social_score', 'enterprising_score', 'conventional_score')
            ->first();

        if (!$results) {
            return response()->json(['message' => 'Career test result not found'], 404);
        }

        return response()->json($results);
    }



    public function createOrUpdateBasic(Request $request)
    {
        $userId = Auth::guard('api')->id();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'social_category' => 'string|max:255',
            'dob' => 'before:today',
            'gender' => 'string',
            // 'marital_status' => 'string|in:single,married,divorced,widowed',
            // 'physically_challenged' => 'string|in:yes,no',
            // 'bio' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $student = Student::find($userId);
        if ($student) {
            $student->name = $validated['name'];
            $student->save();
        }

        unset($validated['name']);

        // Update or create in 'students_basic_details' table
        StudentsBasicDetail::updateOrCreate(
            ['student_id' => $userId],
            $validated
        );

        return response()->json([
            'message' => 'Student detail saved successfully.',
        ], 200);
    }


    public function createOrUpdateContact(Request $request)
    {

        $userId = Auth::guard('api')->id();

        // Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'mobile' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Extract validated data
        $data = $validator->validated();

        // Find the student by userId
        $student = Student::find($userId);

        if ($student) {
            $student->update([
                'email' => $data['email'],
                'mobile' => $data['mobile']
            ]);

            return response()->json(['message' => 'Student updated successfully', 'student' => $student], 200);
        }

        return response()->json(['message' => 'Student not found'], 404);
    }

    public function createOrUpdateAddress(Request $request)
    {

        $userId = Auth::guard('api')->id();

        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        StudentsContactDetail::updateOrCreate(
            ['student_id' => $userId],
            $validated
        );

        return response()->json(['message' => 'Contact details saved successfully'], 200);
    }


    public function createOrUpdateEducationDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'school_name_x' => 'required|string',
            'board_x' => 'required|string',
            'stream_x' => 'nullable|string',
            'passing_year_x' => 'required|integer',
            'percentage_x' => 'required|numeric',
            'school_name_xii' => 'nullable|string',
            'board_xii' => 'nullable|string',
            'stream_xii' => 'nullable|string',
            'passing_year_xii' => 'nullable|integer',
            'percentage_xii' => 'nullable|numeric',
            'college_name' => 'nullable|string',
            'university_name' => 'nullable|string',
            'degree' => 'nullable|string',
            'passing_year_college' => 'nullable|integer',
            'percentage_college' => 'nullable|numeric',
        ]);

        $userId = Auth::guard('api')->id();

        // Handle validation failure
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Extract validated data
        $data = $validator->validated();

        // Create or update education details
        $educationDetails = StudentEducation::updateOrCreate(
            ['student_id' => $userId],
            $data
        );

        // Determine the response message
        $message = $educationDetails->wasRecentlyCreated ?
            'Education details created successfully' :
            'Education details updated successfully';

        // Return response
        return response()->json(['message' => $message, 'data' => $educationDetails], 200);
    }

    public function createOrUpdatePreferenceDetails(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'stream' => 'nullable',
            'level' => 'nullable',
            'specialization' => 'nullable',
            'location' => 'nullable',
            'course' => 'nullable',
            'fee_range' => 'nullable',
            'college' => 'nullable',
        ]);

        $userId = Auth::guard('api')->id();

        // Handle validation failure
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Extract validated data
        $data = $validator->validated();

        // Create or update preference details
        $preferenceDetails = StudentPreference::updateOrCreate(
            ['student_id' => $userId],
            $data
        );

        $message = $preferenceDetails->wasRecentlyCreated ?
            'Preference details created successfully' :
            'Preference details updated successfully';

        return response()->json(['message' => $message, 'data' => $preferenceDetails], 200);
    }

    public function checkCareerTestStatus()
    {
        $userId = Auth::guard('api')->id();

        $testResultExists = CareerTestResult::where('user_id', $userId)->exists();

        if ($testResultExists) {
            return response()->json(['message' => 'Test completed']);
        } else {
            return response()->json(['message' => 'Test not completed']);
        }
    }
    public function getSkillsByLetters(Request $request)
    {
        // Validate the request to ensure 'letters' parameter is provided
        $request->validate([
            'letters' => 'required|string|size:3', // Ensure it's a string of exactly 3 characters
        ]);

        $letters = $request->input('letters');

        // Find the CareerCombinationLetter record matching the input letters
        $careerCombinationLetter = CareerCombinationLetter::where('similar_letters', $letters)->first();
        if (!$careerCombinationLetter) {
            return response()->json(['error' => 'No matching letter found'], 404);
        }

        $uniqueLetter = $careerCombinationLetter->unique_letter;

        // Fetch the skills associated with the unique letter
        $skills = CareerCombinationSkill::where('unique_letter', $uniqueLetter)->pluck('skill');

        return response()->json($skills);
    }

    public function getCareerSkillsResult(Request $request)
    {
        $userId = Auth::guard('api')->id();

        // Fetch the user's career test result
        $testResult = CareerTestResult::where('user_id', $userId)->first();

        if (!$testResult) {
            return response()->json(['error' => 'No test results found for the user'], 404);
        }

        // Mapping score fields to their respective letters
        $scoreFields = [
            'realistic_score' => 'R',
            'investigative_score' => 'I',
            'artistic_score' => 'A',
            'social_score' => 'S',
            'enterprising_score' => 'E',
            'conventional_score' => 'C',
        ];

        // Extract scores and sort them in descending order
        $scores = [];
        foreach ($scoreFields as $field => $letter) {
            $scores[$letter] = $testResult->$field;
        }
        arsort($scores);

        // Construct result_letters string from sorted scores
        $resultLetters = implode('', array_slice(array_keys($scores), 0, 3));

        $careerCombinationLetter = CareerCombinationLetter::where('similar_letters', $resultLetters)->first();
        if (!$careerCombinationLetter) {
            return response()->json(['error' => 'No matching letter found'], 404);
        }

        $uniqueLetter = $careerCombinationLetter->unique_letter;

        $skills = CareerCombinationSkill::where('unique_letter', $uniqueLetter)->pluck('skill');

        return response()->json($skills);
    }

    public function getStudentsProfileDetails(Request $request)
    { // Get the authenticated user's ID
        $userId = Auth::guard('api')->id();

        // Initialize an empty array for the response
        $response = [];

        // Fetch student's details
        $student = Student::where('id', $userId)->first(['name', 'email', 'mobile']);
        if ($student) {
            $response['student'] = $student;
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }

        // Fetch related details from other models and add to the response if they exist
        $basicDetails = StudentsBasicDetail::where('student_id', $userId)->first();
        if ($basicDetails) {
            $response['basicDetails'] = $basicDetails->makeHidden(['created_at', 'updated_at']);
        }

        $contactDetails = StudentsContactDetail::where('student_id', $userId)->first();
        if ($contactDetails) {
            $response['contactDetails'] = $contactDetails->makeHidden(['created_at', 'updated_at']);
        }

        $educationDetails = StudentEducation::where('student_id', $userId)->first();
        if ($educationDetails) {
            $response['educationDetails'] = $educationDetails->makeHidden(['created_at', 'updated_at']);
        }

        $preferences = StudentPreference::where('student_id', $userId)->first();
        if ($preferences) {
            $response['preferences'] = $preferences->makeHidden(['created_at', 'updated_at']);
        }

        return response()->json($response);
    }



    public function getAllStreams(Request $request)
    {
        $streams = Stream::select('id', 'title', 'description')->get();

        return response()->json($streams);
    }


    public function getAllLevels(Request $request)
    {
        $levels = Level::select('id', 'title', 'description')->get();

        return response()->json($levels);
    }

    public function insertOrUpdateCourse(Request $request)
    {
        // Validation rules, excluding 'id'
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'level_id' => 'required|integer|exists:levels,id',
            'stream_id' => 'required|integer|exists:streams,id',
            'description' => 'nullable|string',
            'duration' => 'required|string|max:255',
        ]);

        // Validation check
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ]);
        }

        // Handling id separately
        $courseId = $request->input('id');
        if ($courseId && !Course::find($courseId)) {
            return response()->json([
                'success' => false,
                'message' => 'Course with the provided ID does not exist.'
            ]);
        }

        // Update or create course
        $course = Course::updateOrCreate(
            ['id' => $courseId],
            $request->only(['name', 'level_id', 'stream_id', 'description', 'duration'])
        );

        // Return response
        return response()->json([
            'success' => true,
            'message' => $courseId ? 'Course updated successfully' : 'Course created successfully',
            'data' => $course
        ]);
    }


    public function insertOrUpdateSpecialization(Request $request)
    {
        // Validation rules, excluding 'id'
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'course_id' => 'required|integer|exists:courses,id',
            'description' => 'nullable|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ]);
        }

        // Handling id separately
        $specializationId = $request->input('id');
        if ($specializationId && !Specialization::find($specializationId)) {
            return response()->json([
                'success' => false,
                'message' => 'Specialization with the provided ID does not exist.'
            ]);
        }

        // Insert or update specialization
        $specialization = Specialization::updateOrCreate(
            ['id' => $specializationId],
            $request->only(['title', 'course_id', 'description'])
        );

        // Return response
        return response()->json([
            'success' => true,
            'message' => $specializationId ? 'Specialization updated successfully' : 'Specialization created successfully',
            'data' => $specialization
        ]);
    }


    public function getSpecializationsByStreamAndLevel(Request $request)
    { // Define validation rules
        $validator = Validator::make($request->all(), [
            'level_id' => 'required|string|exists:levels,title',
            'stream_id' => 'required|string|exists:streams,title',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ]);
        }

        // Retrieve courses based on level and stream titles
        $courses = Course::join('levels', 'levels.id', '=', 'courses.level_id')
            ->join('streams', 'streams.id', '=', 'courses.stream_id')
            ->where('levels.title', $request->input('level_id'))
            ->where('streams.title', $request->input('stream_id'))
            ->get([
                'courses.id',
                'courses.name',
                'courses.description',
                'courses.duration',
                'levels.id as level_id',
                'levels.title as level_name',
                'streams.id as stream_id',
                'streams.title as stream_name'
            ]);

        // Return response
        return response()->json($courses);
    }




    public function getCoursesByLevelAndStream(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'level_id' => 'required|string|exists:levels,title',
            'stream_id' => 'required|string|exists:streams,title',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ]);
        }

        // Retrieve courses based on level and stream titles
        $courses = Course::join('levels', 'levels.id', '=', 'courses.level_id')
            ->join('streams', 'streams.id', '=', 'courses.stream_id')
            ->where('levels.title', $request->input('level_id'))
            ->where('streams.title', $request->input('stream_id'))
            ->get([
                'courses.id',
                'courses.name',
                'courses.description',
                'courses.duration',
                'levels.id as level_id',
                'levels.title as level_name',
                'streams.id as stream_id',
                'streams.title as stream_name'
            ]);

        // Return response
        return response()->json($courses);
    }



    public function getSpecializationsByCourse(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|string|exists:courses,name',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ]);
        }

        // Retrieve specializations for the given course by course name, including course details
        $specializations = Specialization::join('courses', 'courses.id', '=', 'specializations.course_id')
            ->where('courses.name', $request->input('course_id'))
            ->get([
                'specializations.id',
                'specializations.title',
                'specializations.description',
                'courses.id as course_id',
                'courses.name as course_name'
            ]);

        // Return response
        return response()->json($specializations);
    }



    public function insertOrUpdateColleges(Request $request)
    {
        $data = $request->validate([
            'college_full_name' => 'required',
            'college_short_name' => 'required',
            'type' => 'required',
            'approved_by' => 'required',
            'established_year' => 'required|numeric',
            'about' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'city_id' => 'required|exists:cities,id', // assuming you have a cities table
        ]);

        $college = College::insertOrUpdate($data);

        return response()->json($college, 200);
    }


    protected $validationRules = [
        'id' => 'sometimes|required|integer|exists:colleges,id',
        'college_full_name' => 'required|string|max:255',
        'college_short_name' => 'required|string|max:255',
        'type' => 'required|string|max:100',
        'approved_by' => 'required|string|max:255',
        'established_year' => 'required|integer',
        'about' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'website' => 'required|url',
        'city' => 'required|string|max:100'
    ];

    public function insertOrUpdateCollege(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), $this->validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            // Insert or update data
            $college = College::updateOrCreate(
                ['id' => $request->id], // Check field
                $request->all() // Data to be updated or inserted
            );

            return response()->json($college, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function insertOrUpdateCollegeCourse(Request $request)
    {
        // Validation rules
        $rules = [
            'college_id' => 'required|integer|exists:colleges,id',
            'course_id' => 'required|integer|exists:courses,id',
            'fee' => 'required|numeric',
            'description' => 'required|string'
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            // Insert or update data
            $collegeCourse = CollegeCourse::updateOrCreate(
                ['id' => $request->id], // Check field
                $request->only(['college_id', 'course_id', 'fee', 'description']) // Data to be updated or inserted
            );

            return response()->json($collegeCourse, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function getCollegesByCourseFeeAndLocation(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|string|exists:courses,name',
            'fee_range' => 'required|string',
            'city' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $courseName = $request->input('course_id');
        $feeRange = $request->input('fee_range');
        $city = $request->input('city');

        // Split the fee range into min and max values
        $feeRangeArray = explode('-', $feeRange);

        if (count($feeRangeArray) !== 2) {
            return response()->json(['error' => 'Invalid fee range format. Use min-max format.'], 400);
        }

        [$minFee, $maxFee] = $feeRangeArray;

        $colleges = College::join('college_courses', 'colleges.id', '=', 'college_courses.college_id')
            ->join('courses', 'courses.id', '=', 'college_courses.course_id')
            ->where('courses.name', $courseName)
            ->whereBetween('college_courses.fee', [$minFee, $maxFee])
            ->where('colleges.city', $city)
            ->select('colleges.id', 'colleges.college_full_name', 'colleges.college_short_name')
            ->get();

        return response()->json($colleges);
    }

    public function getStudentsByPlace(Request $request)
    {
        // Validate the request
        $request->validate([
            'place' => 'required|string'
        ]);

        // Retrieve the place from the request
        $place = $request->input('place');

        // Query the students by place and include related careerTestResult data
        $students = Student::where('from', $place)
            ->with('careerTestResult') // Assuming the relationship is defined in the Student model
            ->get();

        // Transform the students data to match the required structure
        $transformedStudents = $students->map(function ($student) {
            return [
                'id' => $student->id,
                'name' => $student->name,
                'email' => $student->email,
                'mobile' => $student->mobile,
                'from' => $student->from,
                'realistic_score' => $student->careerTestResult->realistic_score ?? 'N/A',
                'investigative_score' => $student->careerTestResult->investigative_score ?? 'N/A',
                'artistic_score' => $student->careerTestResult->artistic_score ?? 'N/A',
                'social_score' => $student->careerTestResult->social_score ?? 'N/A',
                'enterprising_score' => $student->careerTestResult->enterprising_score ?? 'N/A',
                'conventional_score' => $student->careerTestResult->conventional_score ?? 'N/A',
                'magic_link_token' => $student->magic_link_token ?? 'N/A'
            ];
        });

        // Return the transformed students as a JSON response
        return response()->json($transformedStudents);
    }




    public function getAllColleges()
    {
        $colleges = College::select('id', 'college_full_name', 'college_short_name')->get();

        return response()->json($colleges);
    }




    public function contactUsFormSubmit(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        // Create a new ContactUs record
        $contactUs = ContactUs::create($validatedData);

        // Return a success response
        return response()->json([
            'message' => 'Your message has been sent successfully.',
            'data' => $contactUs
        ]);
    }

    public function schoolContactFormSubmit(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'schoolName' => 'required|max:255',
            'contactPersonName' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'interests' => 'required', // Assuming interests is an array
            'hearAboutUs' => 'nullable|max:255', // Make it nullable
            'additionalRequests' => 'nullable', // Make it nullable
        ]);

        // Create a new ContactSchool record
        $contactSchool = ContactSchool::create($validatedData);

        // Return a success response
        return response()->json([
            'message' => 'Your message has been sent successfully.',
            'data' => $contactSchool
        ]);
    }


    public function collegeContactFormSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'collegeName' => 'required|max:255',
            'contactPersonName' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'hearAboutUs' => 'nullable|max:255', // Make it nullable
            'additionalRequests' => 'nullable', // Make it nullable
        ]);

        // Create a new ContactSchool record
        $contactSchool = ContactCollege::create($validatedData);

        // Return a success response
        return response()->json([
            'message' => 'Your message has been sent successfully.',
            'data' => $contactSchool
        ]);
    }


    public function counsellorCallScheduleCreate(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'date' => 'required|date',
            'time_slot' => 'required|string|max:255',
        ]);

        // Get the authenticated user's ID
        $userId = Auth::guard('api')->id();

        // Create and save the new schedule
        $schedule = new ScheduleCounselorsCall();
        $schedule->student_id = $userId;
        $schedule->date = $validated['date'];
        $schedule->time_slot = $validated['time_slot'];
        $schedule->save();

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Counselor call schedule successfully created.',
            'schedule' => $schedule
        ]);
    }

    public function uploadDocument(Request $request)
    {
        $documentType = $this->determineDocumentType($request->route()->getName());

        $request->validate([
            'certificate' => 'required|file|max:5120|mimes:pdf,jpg,jpeg,png', // 5MB Max, PDF/JPG/JPEG/PNG only
        ]);

        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Determine the directory based on the document type
            $directory = $documentType === 'aadhar' ? 'aadhar' : 'certificates';
            $filePath = $file->storeAs($directory, $filename, 'public');

            $studentId = Auth::guard('api')->id(); // Get the authenticated student's ID

            // Construct the document field name based on the document type
            $documentField = $documentType === 'aadhar' ? 'aadhar_card' : $documentType . '_certificate';

            // Update or create document attachment entry
            if ($documentType === 'aadhar') {
                DocumentAttachment::updateOrCreate(
                    ['student_id' => $studentId],
                    ['aadhar_card' => $filename] // Store the filename in the corresponding field
                );
            } else {
                DocumentAttachment::updateOrCreate(
                    ['student_id' => $studentId],
                    [$documentField => $filename] // Store the filename in the corresponding field
                );
            }

            // Return the path of the uploaded file in the response
            return response()->json(['path' => Storage::url($filePath)], 201);
        }

        // Return an error response if no file was uploaded
        return response()->json(['error' => 'Certificate not uploaded'], 400);
    }


    protected function determineDocumentType($routeName)
    {
        switch ($routeName) {
            case 'students.upload10thcertificate':
                return '10th';
            case 'students.upload12thcertificate':
                return '12th';
            case 'students.uploadaadharcard':
                return 'aadhar';
            default:
                return ''; // Default case if needed
        }
    }

    public function fetchDocuments(Request $request)
    {
        $request->validate([
            'document_types' => 'required|array', // Array of document types to fetch
        ]);

        $studentId = Auth::guard('api')->id(); // Get the authenticated student's ID

        $documentTypes = $request->input('document_types');

        $documents = DocumentAttachment::where('student_id', $studentId)->first();

        if (!$documents) {
            return response()->json(['error' => 'Documents not found'], 404);
        }

        $documentPaths = [];

        foreach ($documentTypes as $type) {
            switch ($type) {
                case '10th':
                    $documentPaths['10th_certificate'] = $documents->{'10th_certificate'} ? Storage::url('certificates/' . $documents->{'10th_certificate'}) : null;
                    break;
                case '12th':
                    $documentPaths['12th_certificate'] = $documents->{'12th_certificate'} ? Storage::url('certificates/' . $documents->{'12th_certificate'}) : null;
                    break;
                case 'aadhar':
                    $documentPaths['aadhar_card'] = $documents->aadhar_card ? Storage::url('aadhar/' . $documents->aadhar_card) : null;
                    break;
                default:
                    // Ignore unknown document types
                    break;
            }
        }

        return response()->json($documentPaths, 200);
    }







    // Extraa Edge APIs
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
