@extends('Layouts.app')
@section('content')
<div style="padding: 2rem!important;padding-left: 3rem!important;padding-right: 3rem!important;">
    <div>
        <div style="border: 1px solid black; padding:15px;margin:15px; border-radius:8px">
        <h4> Author      : {{$payload->first_name}} {{$payload->last_name}}</h4>
        <p> Bio         : {{$payload->biography}}</p>
        <p> Gender      : {{$payload->gender}}</p>
        <p> DOB         : {{date('d-m-Y', strtotime($payload->birthday))}}</p>
        <p> Birth Place : {{$payload->place_of_birth}}</p>
        </div>
       
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Release Date</th>
                    <th>ISBN</th>
                    <th>Format</th>
                    <th>Pages</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payload->books as $item)

                <tr id="{{$item->id}}">
                   <td>{{$item->id}}</td>
                   <td>{{$item->title}}</td>
                   <td>{{$item->description,10}}</td>
                   <td>{{date('d-m-Y', strtotime($item->release_date))}}</td>
                   <td>{{$item->isbn}}</td>
                   <td>{{$item->format}}</td>
                   <td>{{$item->number_of_pages}}</td>
                   
                   <td>
                    <div>
                        <button class="btn btn-primary" onclick="bookDelete({{$item->id}})"><i class="fa-solid fa-trash"></i></button>
                        
                    </div>
                   </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    function bookDelete(id){
        
        var url = "/books/"+id;
        $.ajax({
            url: url, 
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(){
                $("#"+id).remove();
            }
        });
    }
</script>
@stop