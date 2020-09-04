<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    protected $endpoint = 'http://recruitment.api.jujura.id/api';

    public function register(Request $request){
        $response = '';

        if($request->isMethod('POST')){
            $this->validate($request, [
                'user_name' => 'required',
                'user_email' => 'required|email',
            ]);
    
            $response = Http::post($this->endpoint.'/register', [
                'user_name' => $request->user_name,
                'user_email' => $request->user_email,
            ]);

            $response = json_decode($response);
        }

        return view('register', compact('response'));
    }

    public function product(Request $request){
        $response = '';

        if($request->isMethod('POST')){
            $this->validate($request, [
                'signature_key' => 'required',
            ]);
    
            $response = Http::get($this->endpoint.'/product', [
                'signature_key' => $request->signature_key,
            ]);

            $response = json_decode($response);
        }
        
        return view('product', compact('response'));
    }

    public function salesList(Request $request){
        $response = '';

        if($request->isMethod('POST')){
            $this->validate($request, [
                'signature_key' => 'required',
            ]);
    
            $response = Http::post($this->endpoint.'/sales', [
                'signature_key' => $request->signature_key,
            ]);

            $response = json_decode($response);
        }
        
        return view('sales_list', compact('response'));
    }

    public function salesInsert(Request $request){
        $response = '';
        $items = [
            [
                "item_id" => "01026B",
                "qty" => 1,
                "price" => 180000,
                "total" => 180000
            ],
            [
                "item_id" => "02010L",
                "qty" => 5,
                "price" => 100000,
                "total" => 500000
            ],
            [
                "item_id" => "02024L",
                "qty" => 2,
                "price" => 150000,
                "total" => 300000
            ]
        ];

        if($request->isMethod('POST')){
            $this->validate($request, [
                'signature_key' => 'required',
                'payment_type' => 'required',
                'gross_amount' => 'required',
                'currency' => 'required',
            ]);
    
            $response = Http::post($this->endpoint.'/sales/insert', [
                'signature_key' => $request->signature_key,
                'payment_type' => $request->payment_type,
                'gross_amount' => $request->gross_amount,
                'currency' => $request->currency,
                'items' => $items,
            ]);

            $response = json_decode($response);
        }
        
        return view('sales_insert', compact('response'));
    }
}
