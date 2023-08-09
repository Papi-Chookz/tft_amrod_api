<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\AmrodStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmrodStockController extends Controller
{
    public function storeStock(Request $request)
    {
        $customer_id = $request->customer_id;
        $integration_type_id = $request->integration_type_id;

        AmrodStock::query()
            ->truncate();
        
        $token = DB::table('bearer_tokens')
                    ->select('token')
                    ->where('customer_id', $customer_id)
                    ->where('integration_type_id', $integration_type_id)
                    ->get();

        $url = 'https://vendorapi.amrod.co.za/api/v1/Stock/';

        $access_token = $token[0]->token;

        $client = new Client([
            'headers' => 
                [
                    'Authorization' => "Bearer {$access_token}",
                    "Accept" => "application/json",
                ]
        ]);

        $res = $client->get($url)->getBody()->getContents();

        AmrodStock::create(
            [
                'customer_id' => $customer_id,
                'integration_type_id' => $integration_type_id,
                'data' => $res,
            ]
        );


    }

}
