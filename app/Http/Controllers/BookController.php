<?php

namespace App\Http\Controllers;

use App\Services\SymfonyAPI;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public $symfony;

    public function __construct()
    {
        $symfony = new SymfonyAPI();
        $this->symfony = $symfony;
    }

    public function delete(Request $request){

        $bookId = $request->id;
   
     
        $response = $this->symfony->makeRequest("DELETE", "books/$bookId");

        if($response == null){
            return true;
        }else
            return response("Unexpected Error",500);

    }

    public function create(){

        $response = $this->symfony->makeRequest("GET",'authors');
        if($response->items != null){
            $authors = [];
            foreach($response->items as $author){
                $authors[$author->id] = $author->first_name . " " .  $author->last_name;
            }
        }
        
        return view('pages.books.create', compact('authors'));
    }

    public function store(Request $request){
    //     [▼ // app\Http\Controllers\BookController.php:46
    //     "_token" => "J87dsUbUWkFp2gypge9fAT1dqaWHZt4fVxPoNmSd"
    //     "author" => "62725"
    //     "title" => "asdfsdf"
    //     "release_date" => "2002-10-10"
    //     "description" => "adasdasfsdfd"
    //     "isbn" => "gasdfsafd"
    //     "format" => "safdasda"
    //     "number_of_pages" => "232"
    //   ]

    $request->validate([
        'author' => 'required|integer',
        'title' => 'required|string|max:255',
        'release_date' => 'required|date',
        'description' => 'required|string',
        'isbn' => 'required|string|max:255',
        'format' => 'required|string|max:255',
        'number_of_pages' => 'required|integer',
    ]);

    $payload = [
        "author" => [
            "id" => $request->author
        ],
        "title" => $request->title,
        "release_date" => $request->release_date,
        "description" => $request->description,
        "isbn" => $request->isbn,
        "format" => $request->format,
        "number_of_pages" => intval($request->number_of_pages),
    ];
    
    $response = $this->symfony->makeRequest("POST",'books',$payload);

     return redirect()->route('author.index')->with('success', 'New Book Added');   

    }
}
