@extends('Layouts.app')
@section('content')
<div style="padding: 2rem!important;padding-left: 3rem!important;padding-right: 3rem!important;">
    <div style="margin-top:10px;margin-bottom:20px;">
        <a href="{{route('books.create')}}"><button class="btn btn-primary">Add Book </button></a>
    </div>
    <div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthdate</th>
                    <th>Gender</th>
                    <th>Birth Place</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payload->items as $item)

                <tr id="{{$item->id}}">
                   <td>{{$item->id}}</td>
                   <td>{{$item->first_name}}</td>
                   <td>{{$item->last_name}}</td>
                   <td>{{date('d-m-Y', strtotime($item->birthday));}}</td>
                   <td>{{$item->gender}}</td>
                   <td>{{$item->place_of_birth}}</td>
                   <td>
                    <div>
                        <a href="/authors/{{$item->id}}"><button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button></a>
                        <button class="btn btn-primary" onclick="authorDelete({{$item->id}})"><i class="fa-solid fa-trash"></i></button>
                    </div>
                   </td>
                </tr>
                    
                @endforeach
                
                
            </tbody>
        </table>
    </div>
    @if (\Session::has('success'))
    <div class="alert success">
        <span class="close">&times;</span>
        <strong>Success!</strong> {{ \Session::get('success') }}
      </div>
      @endif

      <div class="alert success d-none">
        <span class="close">&times;</span>
        <strong>Success!</strong> {{ \Session::get('success') }}
      </div>
</div>

<style>
    .alert {
  padding: 20px;
  border-radius: 4px;
  margin-bottom: 10px;
}

.success {
  background-color: #dff0d8;
  color: #3c763d;
  border: 1px solid #d6e9c6;
}

.d-none{
    display: none;
}

.close {
  float: right;
  font-size: 18px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover {
  color: #000;
}
</style>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    
    const closeIcon = document.querySelector('.alert.success .close');
    closeIcon.addEventListener('click', function() {
    const alert = this.parentElement;
    alert.remove();
});

function authorDelete(id){
        
        var url = "/authors/"+id;
        $.ajax({
            url: url, 
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(){
                $("#"+id).remove();
            },
            error: function (error) {
                alert(error.responseText);
            }
        });
    }
</script>
@stop