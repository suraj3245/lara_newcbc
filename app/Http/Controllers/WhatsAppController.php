<?php

namespace App\Http\Controllers;

use App\Services\WhatsAppService;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    protected $whatsAppService;

    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }

    public function sendMessage(Request $request)
    {
        $to = $request->input('to');
        $templateNamespace = $request->input('templateNamespace', 'default_namespace');
        $templateName = $request->input('templateName');
        $languageCode = $request->input('languageCode', 'en');
        $parameters = $request->input('parameters', []);

        return response()->json(
            $this->whatsAppService->sendMessage($to, $templateNamespace, $templateName, $languageCode, $parameters)
        );
    }
}
