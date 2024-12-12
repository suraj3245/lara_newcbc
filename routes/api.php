<?php

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\StaffPortalController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'students', 'middleware' => ['api']], function () {
    Route::post('/register', [StudentController::class, 'register']);
    Route::post('/registerdbs', [StudentController::class, 'registerdbs']);

    Route::post('/getwhatsappotp', [StudentController::class, 'getWhatsAppOtp']);
    Route::post('/login', [StudentController::class, 'login']);

    Route::post('/send-wp-message', [WhatsAppController::class, 'sendMessage'])->name("send-wp-message");

    Route::post('/loginwithphonewpotpsend', [StudentController::class, 'loginWithPhonewpOtpSend']);
    Route::post('/loginwithphone', [StudentController::class, 'loginWithPhone']);

    Route::post('/request-magic-link', [StudentController::class, 'requestMagicLink']);

    Route::post('/loginwithmagiclink', [StudentController::class, 'magicLinkLoginPostMethod']);
 
    // Without Authantication start
    Route::post('/getallstreams', [StudentController::class, 'getAllStreams']);
    Route::post('/getalllevels', [StudentController::class, 'getAllLevels']);
    Route::post('/getspecializationsbystreamandlevel', [StudentController::class, 'getSpecializationsByStreamAndLevel']);
    Route::post('/getspecializationsbylevelandstream', [StudentController::class, 'getCoursesByLevelAndStream']);
    Route::post('/getspecializationsbycourse', [StudentController::class, 'getSpecializationsByCourse']);
    Route::post('/getcollegesbycoursefeeandlocation', [StudentController::class, 'getCollegesByCourseFeeAndLocation']);
    Route::post('/getallcolleges', [StudentController::class, 'getAllColleges']);


    Route::post('/contactusformsubmit', [StudentController::class, 'contactUsFormSubmit']);
    Route::post('/schoolcontactformsubmit', [StudentController::class, 'schoolContactFormSubmit']);
    Route::post('/collegecontactformsubmit', [StudentController::class, 'collegeContactFormSubmit']);
    // Without Authantication end

    // Have to make new auth start
    Route::post('/insertorppdatecourse', [StudentController::class, 'insertOrUpdateCourse']);
    Route::post('/insertorupdatespecialization', [StudentController::class, 'insertOrUpdateSpecialization']);
    Route::post('/insertorupdatecollege', [StudentController::class, 'insertOrUpdateCollege']);
    Route::post('/insertorupdatecollegecourse', [StudentController::class, 'insertOrUpdateCollegeCourse']);

    // Staff Portal codes start
    Route::post('/createstudentcareertest', [StaffPortalController::class, 'createStudentCareerTest']);
    Route::post('/fetchcareertestresult', [StaffPortalController::class, 'fetchCareerTestResult']);
    // Staff Portal codes end


    Route::post('/getstudentsbyplace', [StudentController::class, 'getStudentsByPlace']);
    Route::post('/studentstore', [StudentController::class, 'getstudentstore']);
    Route::post('/studentdelete/{id}', [StudentController::class, 'destroy']);
    Route::post('/studentupdate/{id}', [StudentController::class, 'update']);

    Route::post('/registerschool', [StudentController::class, 'registerschool']);
    Route::post('/loginschool', [StudentController::class, 'loginschool']);
    Route::post('/detailschool', [StudentController::class, 'detailschool']);
    Route::post('/loginwithphonewpotpschool', [StudentController::class, 'loginWithPhonewpOtpSendSchool']);
    Route::post('/loginwithphoneschool', [StudentController::class, 'loginWithPhoneschool']);
    Route::post('/getskillsbyletters', [StudentController::class, 'getSkillsByLetters']);
    Route::post('/setpasswordschool', [StudentController::class, 'setPasswordSchool']);



    // Have to make new auth end

    Route::middleware('auth.student')->group(function () {
        Route::post('/getallcatquestions', [StudentController::class, 'getAllCATQuestions']);
        Route::post('/submitcatanswers', [StudentController::class, 'submitCATAnswers']);
        Route::post('/getcatresult', [StudentController::class, 'getCATResult']);

        Route::post('/setpassword', [StudentController::class, 'setPassword']);

        Route::post('/counsellorcallschedulecreate', [StudentController::class, 'counsellorCallScheduleCreate']);


        Route::post('/upload10thcertificate', [StudentController::class, 'uploadDocument'])->name('students.upload10thcertificate');
        Route::post('/upload12thcertificate', [StudentController::class, 'uploadDocument'])->name('students.upload12thcertificate');
        Route::post('/uploadaadharcard', [StudentController::class, 'uploadDocument'])->name('students.uploadaadharcard');

        Route::post('/fetchdocuments', [StudentController::class, 'fetchDocuments']);


        Route::post('/updatebasicdetails', [StudentController::class, 'createOrUpdateBasic']);
        Route::post('/updatecontactdetails', [StudentController::class, 'createOrUpdateContact']);
        Route::post('/updateAddressLocation', [StudentController::class, 'createOrUpdateAddress']);
        Route::post('/updateEducationDetails', [StudentController::class, 'createOrUpdateEducationDetails']);
        Route::post('/updatepreference', [StudentController::class, 'createOrUpdatePreferenceDetails']);
        Route::post('/checkcareerteststatus', [StudentController::class, 'checkCareerTestStatus']);
        Route::post('/careerresultskills', [StudentController::class, 'getCareerSkillsResult']);
        Route::post('/getstudentsprofile', [StudentController::class, 'getStudentsProfileDetails']);
    });
});
