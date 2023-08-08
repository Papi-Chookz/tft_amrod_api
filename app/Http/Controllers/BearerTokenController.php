<?php

namespace App\Http\Controllers;

use App\Models\BearerToken;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BearerTokenController extends Controller
{
    public function getBearerToken(Request $request)
    {
        $customer_id = $request->customer_id;
        $integration_type_id = $request->integration_type_id;

        BearerToken::query()
            ->truncate();

        $response = Http::post('https://identity.amrod.co.za/VendorLogin', [
            'UserName' => 'info@brandtality.co.za',
            'Password' => '8Svv7hOn2W6$#QLf8I1m',
            'CustomerCode' => '024095'
        ])->json();

        $token = Arr::get($response, 'token');
        $expiry = Arr::get($response, 'expiry');

        BearerToken::create(
            [
                'customer_id' => $customer_id,
                'integration_type_id' => $integration_type_id,
                'token' => $token,
                'expiry' => $expiry
            ]
        );
    }
}
