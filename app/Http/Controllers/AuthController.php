<?php

namespace App\Http\Controllers;

use App\Services\SymfonyAPI;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $symfony;

    public function __construct()
    {
        $symfony = new SymfonyAPI();
        $this->symfony = $symfony;
    }
    public function login(Request $request){

      if ($request->session()->has('token')) {
        return redirect()->route('dashboard.index');
      }

      return view('pages.Auth.login');
    }

    public function attempt(Request $request){

      $payload = [
        "email" => $request->email,
        "password" => $request->password
      ];

      $response = $this->symfony->AuthUser('POST','token',$payload);
      $response = json_decode($response);
  
      if(isset($response->token_key )){
        session(['token' => $response->token_key]);
        session(['name' => $response->user->first_name . " " . $response->user->last_name]);
        return redirect()->route('dashboard.index');
      }else{
        return redirect()->back();
      }
    }

    public function logout(Request $request){

      $request->session()->flush();

      return redirect()->route('login');

    }
}
