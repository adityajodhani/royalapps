@extends('Layouts.app')
@section('content')
   <div style="padding: 10px">
        <div style="padding: 10px">
            <form method="POST" action="{{route('books.store')}}">
                @csrf
                <label for="author">Author:</label>
                <select id="author" name="author">
                   @foreach ($authors as $id => $author)
                    <option value="{{$id}}">{{$author}}</option>
                   @endforeach
                </select>
                
                
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required><br>
              
                <label for="release_date">Release Date:</label>
                <input type="date" id="release_date" name="release_date" required><br>
              
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea><br>
              
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" required><br>
              
                <label for="format">Format:</label>
                <input type="text" id="format" name="format" required><br>
              
                <label for="number_of_pages">Number of Pages:</label>
                <input type="number" id="number_of_pages" name="number_of_pages" required><br>
              
                <input type="submit" value="Submit">
              </form>
        </div>
        @if($errors->any())
        <div class="alert error">
            {{ implode('', $errors->all(':message')) }}
            <span class="close">&times;</span>
             {{ \Session::get('success') }}
          </div>
        @endif
   </div>
   <style>
    form {
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.error {
  background-color: #f0dfd8;
  color: red;
  border: 1px solid red;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea {
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 10px;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

select {
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
}

option:first-child {
  color: gray;
}

option:not(:first-child):hover,
option:not(:first-child):focus {
  background-color: #e6e6e6;
}

   </style>
@stop