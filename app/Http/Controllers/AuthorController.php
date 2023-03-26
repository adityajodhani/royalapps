<?php

namespace App\Http\Controllers;

use App\Services\SymfonyAPI;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public $symfony;

    public function __construct()
    {
        $symfony = new SymfonyAPI();
        $this->symfony = $symfony;
    }

    public function index(){

        $payload = $this->symfony->makeRequest("GET",'authors');
        
        return view('pages.author.index',compact('payload'));
    }

    public function view(Request $request){

        $authorId = $request->id;
        $payload = $this->symfony->makeRequest("GET","authors/$authorId");
        if(isset($payload->id) && $payload->id == $request->id){
            return view('pages.author.view',compact('payload'));
        }
        
    }

    
    public function delete(Request $request){
        $authorId = $request->id;

        $response = $this->symfony->makeRequest("GET", "authors/$authorId");
        
        if(count($response->books) > 0){
            return response("Author Not Eligible for Deletation",400);
        }

        $response = $this->symfony->makeRequest("DELETE", "authors/$authorId");
        if($response == null){
            return true;
        }else
            return response("Unexpected Error",500);

    }

}
