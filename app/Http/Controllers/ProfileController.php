<?php

namespace App\Http\Controllers;

use App\Services\SymfonyAPI;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public $symfony;

    public function __construct()
    {
        $symfony = new SymfonyAPI();
        $this->symfony = $symfony;
    }

    public function index(){
        $profile = $this->symfony->makeRequest("GET",'me');
        
        return view('pages.profile.index',compact('profile'));
    }
}
