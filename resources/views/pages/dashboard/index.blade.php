@extends('Layouts.app')
@section('content')
<div class="row-2">
    <a class="box-div" href="{{route('author.index')}}"  style="margin-left: 10px">Authors</a>
    <a class="box-div" href="{{route('profile.index')}}" style="margin-left: 10px;">Profile</a>
  </div>
  <style>
    .row-2 {
        display: flex;
        margin-left: 25px; 
    }

    a:hover{
       text-decoration: none; 
    }
.box-div {
  padding: 10px;
  margin-top: 25px; 
  
  margin-bottom: 25px; 
  background-color: #ccc;
  margin-right: 10px; /* Optional: Adds a small space between boxes */
}
  </style>
@stop