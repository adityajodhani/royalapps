<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SymfonyAPI
{
    public $request; 

    public function __construct()
    {
       
    }

    public function makeRequest($method,$resourceUri, $payload = Null){

        try {
            $request = new Request();
            
            $authToken = session('token');

        $url = "https://symfony-skeleton.q-tests.com/api/v2/$resourceUri" ;



     
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $authToken
        ));
        if($payload){
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        }
        $response = curl_exec($ch);
        
        return json_decode($response);
    } catch (\Exception $e) {
          
        return $e->getMessage();
    }

    }

    public function AuthUser($method,$resourceUri,$payload){

        try {

        $url = 'https://symfony-skeleton.q-tests.com/api/v2/'. $resourceUri;
        $headers = [
            'content-type' => 'application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if($payload){
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        return $response;

    } catch (\Exception $e) {
        return $e->getMessage();
    }
    
    }
}