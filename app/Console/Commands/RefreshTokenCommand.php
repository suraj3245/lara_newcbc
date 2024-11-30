<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RefreshTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-token-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $url = 'https://careerbuddyclub.ameyo.net:9855/v1/users/login'; // The URL to refresh the token
    $username = 'admin'; // Directly specifying the username
    $password = 'Ameyo@1234'; // Directly specifying the password

    $credentials = base64_encode($username . ':' . $password);

    $response = Http::withHeaders([
        'Authorization' => 'Basic ' . $credentials, // Basic Auth header
        'username' => 'admin',
        'new_password' => 'Ameyo@1234',
    ])->post($url);

    if ($response->successful()) {
        // Decode the response and get the token from the users array
        $data = $response->json();
        if (isset($data['users'][0]['token'])) {
            $token = $data['users'][0]['token'];

            // Save the token to the database
            \App\Models\ApiToken::updateOrCreate(
                ['service' => 'whatsapp'], // Assuming 'whatsapp' identifies the WhatsApp service
                ['token' => $token]
            );

            $this->info('API token refreshed successfully.');
        } else {
            $this->error('Token not found in the API response.');
            Log::error('Token not found in the API response.', [
                'response' => $data,
            ]);
        }
    } else {
        // Log the failure reason
        Log::error('Failed to refresh the API token.', [
            'url' => $url,
            'status' => $response->status(),
            'response' => $response->body(),
        ]);
        $this->error('Failed to refresh the API token. Check logs for details.');
    }

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => 'https://careerbuddyclub.ameyo.net:9855/v1/messages/',
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'POST',
    //     CURLOPT_POSTFIELDS => json_encode(array(
    //         "to" => "916282397497",
    //         "type" => "template",
    //         "template" => array(
    //             "namespace" => "accab1fc_05eb_42af_bb93_209e862945df",
    //             "name" => "cbc_registration_otp",
    //             "language" => array(
    //                 "policy" => "deterministic",
    //                 "code" => "en"
    //             ),
    //             "components" => array(
    //                 array(
    //                     "type" => "body",
    //                     "parameters" => array(
    //                         array(
    //                             "type" => "text",
    //                             "text" => "Rishana"
    //                         ),
    //                         array(
    //                             "type" => "text",
    //                             "text" => "12345"
    //                         )
    //                     )
    //                 )
    //             )
    //         )
    //     )),
    //     CURLOPT_HTTPHEADER => array(
    //         'Content-Type: application/json',
    //         // 'Authorization: Bearer ' . $token 
    //         'Authorization: Bearer eyJhbGciOiAiSFMyNTYiLCAidHlwIjogIkpXVCJ9.eyJ1c2VyIjoiYWRtaW4iLCJpYXQiOjE3MTIyOTY1MjksImV4cCI6MTcxMjkwMTMyOSwid2E6cmFuZCI6IjczZGZkZjI1NTk3N2IzNDE3ZGZkNDVhMDY4MzlkMDQ5In0.UMeIEY_qLjLl3sTyLQvEDSmcaVgE6QcTT914dxuLIU0'
    //     ),
    // ));

    // $response = curl_exec($curl);
    // curl_close($curl);

// $curl = curl_init();

// curl_setopt_array($curl, [
//     CURLOPT_URL => 'https://careerbuddyclub.ameyo.net:9855/v1/users/login',
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => 'POST',
//     CURLOPT_POSTFIELDS => json_encode([]), // Adjust if your API expects any specific body
//     CURLOPT_HTTPHEADER => [
//         'Content-Type: application/json', // Assuming JSON content type is correct
//         'Authorization: Basic YWRtaW46QW1leW9AMTIzNA==', // Your encoded credentials
//     ],
// ]);

// $response = curl_exec($curl);
// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://careerbuddyclub.ameyo.net:9855/v1/users/login',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_HTTPHEADER => array(
//     'Authorization: Basic YWRtaW46QW1leW9AMTIzNA=='
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;
// $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
// // curl_close($curl);

// // Decode the JSON response
// $data = json_decode($response, true);


// if ($httpcode == 200 && isset($data['users'][0]['token'])) {
//     $token = $data['users'][0]['token'];
//         // Assuming the response is JSON and contains an access token
     
//     } else {
//         // Log the failure with the HTTP status code and response body for debugging
//         Log::error('Failed to refresh the API token.', [
//             'http_status' => $httpcode,
//             'response' => $response,
//         ]);
//         $this->error("Failed to refresh the API token. HTTP Status: $httpcode. Check logs for details.");
//     }


}
}

    
    /**
     * Save the refreshed token to a secure place.
     * Here's a simple way to save it to the .env file, but consider more secure storage in production.
     */
   

