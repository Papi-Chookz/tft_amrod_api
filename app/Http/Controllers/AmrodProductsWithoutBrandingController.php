<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AmrodProductsWithBranding;
use App\Models\AmrodProductsWithoutBranding;


class AmrodProductsWithoutBrandingController extends Controller
{
    
    public function storeProductsWithoutBranding(Request $request)
    {
        $customer_id = $request->customer_id;
        $integration_type_id = $request->integration_type_id;

        AmrodProductsWithoutBranding::query()
            ->truncate();

        $token = DB::table('bearer_tokens')
                    ->select('token')
                    ->where('customer_id', $customer_id)
                    ->where('integration_type_id', $integration_type_id)
                    ->get();

        $url = 'https://vendorapi.amrod.co.za/api/v1/Products/';

        $access_token = $token[0]->token;

        $client = new Client([
            'headers' => 
                [
                    'Authorization' => "Bearer {$access_token}",
                    "Accept" => "application/json",
                ]
        ]);

        $res = $client->get($url)->getBody()->getContents();

        AmrodProductsWithoutBranding::create(
            [
                'customer_id' => $customer_id,
                'integration_type_id' => $integration_type_id,
                'data' => $res,
            ]
        );


    }


    public function storeProductsWithBranding(Request $request)
    {
        $customer_id = $request->customer_id;
        $integration_type_id = $request->integration_type_id;

        AmrodProductsWithBranding::query()
            ->truncate();

        $token = DB::table('bearer_tokens')
                    ->select('token')
                    ->where('customer_id', $customer_id)
                    ->where('integration_type_id', $integration_type_id)
                    ->get();

        $url = 'https://vendorapi.amrod.co.za/api/v1/Products/GetProductsAndBranding';

        $access_token = $access_token = $token[0]->token;

        $client = new Client([
            'headers' => 
                [
                    'Authorization' => "Bearer {$access_token}",
                    "Accept" => "application/json",
                ]
        ]);

        $res = $client->get($url)->getBody()->getContents();

        AmrodProductsWithBranding::create(
            [
                'customer_id' => $customer_id,
                'integration_type_id' => $integration_type_id,
                'data' => $res,
            ]
        );
    }

}
