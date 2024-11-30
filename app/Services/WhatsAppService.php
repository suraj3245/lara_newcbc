<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WhatsAppService
{
    private $baseUrl;
    private $username;
    private $password;

    public function __construct()
    {
        $this->baseUrl = env('WHATSAPP_API_URL');
        $this->username = env('WHATSAPP_API_USERNAME');
        $this->password = env('WHATSAPP_API_PASSWORD');
    }

    public function login()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode("{$this->username}:{$this->password}"),
            'Content-Type' => 'application/json'
        ])->post("{$this->baseUrl}/users/login");

        if ($response->successful()) {
            $token = $response->json()['users'][0]['token'];
            $expiresAt = now()->addDays(7); // Adjust according to the actual token expiry
            Cache::put('whatsapp_api_token', $token, $expiresAt);
            return $token;
        }

        throw new \Exception("Failed to login to WhatsApp API");
    }

    public function sendMessage($to, $templateNamespace, $templateName, $languageCode, $parameters)
    {
        $token = Cache::get('whatsapp_api_token', function () {
            return $this->login();
        });

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->post("{$this->baseUrl}/messages", [
            'to' => $to,
            'type' => 'template',
            'template' => [
                'namespace' => $templateNamespace,
                'name' => $templateName,
                'language' => [
                    'policy' => 'deterministic',
                    'code' => $languageCode
                ],
                'components' => [
                    [
                        'type' => 'body',
                        'parameters' => $parameters
                    ]
                ]
            ]
        ]);

        return $response->json();
    }
}
