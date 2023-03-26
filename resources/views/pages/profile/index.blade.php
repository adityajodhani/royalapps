@extends('Layouts.app')
@section('content')
<h1 style="margin-bottom: 20px"><i class="fa-solid fa-user"></i> My Profile</h1>

<table style="margin-bottom: 110px">
  <tr>
    <td>ID</td>
    <td>{{$profile->id}}</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>{{$profile->email}}</td>
  </tr>
  <tr>
    <td>First Name</td>
    <td>{{$profile->first_name}}</td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td>{{$profile->last_name}}</td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>{{$profile->gender}}</td>
  </tr>

</table>
<style>
    h1 {
  text-align: center;
  margin-top: 20px;
}

table {
  border-collapse: collapse;
  margin: 0 auto;
  width: 80%;
}

td {
  padding: 10px;
  border: 1px solid #ccc;
}

td:first-child {
  font-weight: bold;
  background-color: #f2f2f2;
}
</style>
@stop