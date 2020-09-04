<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    protected $endpoint = 'http://recruitment.api.jujura.id/api';

    public function register(Request $request){
        $this->validate($request, [
            'user_name' => 'required',
            'user_email' => 'required|email',
        ]);

        $response = Http::post($this->endpoint.'/register', [
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
        ]);

        return response()->json($response);
    }

    public function product(Request $request){
        $this->validate($request, [
            'signature_key' => 'required',
        ]);

        $response = Http::get($this->endpoint.'/product', [
            'signature_key' => $request->signature_key,
        ]);

        return $response;
        
    }

    public function salesList(Request $request){
        $this->validate($request, [
            'signature_key' => 'required',
        ]);

        $response = Http::post($this->endpoint.'/sales', [
            'signature_key' => $request->signature_key,
        ]);

        return response()->json($response);        
        
    }

    public function salesInsert(Request $request){
        $this->validate($request, [
            'signature_key' => 'required',
            'payment_type' => 'required',
            'gross_amount' => 'required',
            'currency' => 'required',
            'items' => 'required',
            'items.*.item_id' => 'required',
            'items.*.qty' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:1',
            'items.*.total' => 'required|numeric|min:1',
        ]);

        $response = Http::post($this->endpoint.'/sales/insert', [
            'signature_key' => $request->signature_key,
            'payment_type' => $request->payment_type,
            'gross_amount' => $request->gross_amount,
            'currency' => $request->currency,
            'items' => $request->items,
        ]);

        return response()->json($response);
    }
}
