<?php

namespace App\Http\Controllers;

use App\Models\Webhook;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function webhook(Request $request)
    {

        $rawBody = $request->getContent();
        $requestBody = json_decode($rawBody, true);

        $header = $request->headers->all();
        $path = $request->path();
        $full_url = $request->fullUrl();
        $domain = $request->getHost();

        $data = [
            'host' => $domain,
            'full_url' => $full_url,
            'path' => $path,
            'body' => $requestBody,
            'header' => $header,
            'logs' => [],
        ];

        Webhook::create($data);

        return response()->json(['success' => 'true']);
    }
}
