<?php

namespace App\Http\Controllers;

use App\Mail\MagicLinkEmail;
use App\Models\CareerTestResult;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str; // Import Str class

class StaffPortalController extends Controller
{


    public function createStudentCareerTest(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'mobile' => 'required|digits_between:10,15',
            'realistic_score' => 'required|numeric',
            'investigative_score' => 'required|numeric',
            'artistic_score' => 'required|numeric',
            'social_score' => 'required|numeric',
            'enterprising_score' => 'required|numeric',
            'conventional_score' => 'required|numeric'
        ]);

        // Check if the student already exists
        $existingStudent = Student::where('email', $request->email)->first();
        if ($existingStudent) {
            return response()->json(['message' => 'User already exists'], 409); // 409 Conflict
        }

        // Create the student record in the database
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile
            // Add other necessary student fields here
        ]);

        // Generate and save the magic link token
        $token = Str::random(60);
        $student->magic_link_token = $token;
        $student->save();

        // Create magic link URL
        // $magicLink = url('/' . $token);
        $magicLink = "https://careerbuddyclub.com/redirect/" . $token; // Updated to shorter URL format

        // Send the magic link via email
        Mail::to($student->email)->send(new MagicLinkEmail($magicLink));

        // Save the career test results
        CareerTestResult::create([
            'user_id' => $student->id,
            'realistic_score' => $request->realistic_score,
            'investigative_score' => $request->investigative_score,
            'artistic_score' => $request->artistic_score,
            'social_score' => $request->social_score,
            'enterprising_score' => $request->enterprising_score,
            'conventional_score' => $request->conventional_score
        ]);

        return response()->json(['message' => 'Student created and magic link sent.']);
    }

    public function fetchCareerTestResult(Request $request)
    {
        $search = $request->input('search', '');
        $studentId = $request->input('student_id'); // Get student ID from request
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 100);

        if ($studentId) {
            // Fetch data for the specific student
            $student = Student::with(['CareerTestResult' => function ($query) {
                $query->when(empty($query->get()), function ($q) {
                    return $q->addSelect(DB::raw('NULL as score'));
                });
            }])
                ->where('id', $studentId)
                ->first();

            if (!$student) {
                return response()->json(['message' => 'Student not found'], 404);
            }

            // Handle case when CareerTestResult is null
            if ($student->CareerTestResult === null) {
                $student->CareerTestResult = new \stdClass(); // Set as empty object or null based on your requirement
            }

            return response()->json(['data' => $student]);
        } else {
            // Fetch data for all students
            $students = Student::with(['CareerTestResult' => function ($query) {
                $query->when(empty($query->get()), function ($q) {
                    return $q->addSelect(DB::raw('NULL as score'));
                });
            }])
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('mobile', 'LIKE', "%{$search}%");
                })
                ->paginate($limit, ['*'], 'page', $page);

            // Custom response structure for all students
            return response()->json([
                'current_page' => $students->currentPage(),
                'data' => $students->items(),
                'total_pages' => $students->lastPage(),
                'total_items' => $students->total()
            ]);
        }
    }
}
