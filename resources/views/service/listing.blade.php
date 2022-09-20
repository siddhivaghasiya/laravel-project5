@extends('adminlt.layout')

@section('content')

 

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr.x {
    font-size: 19px;
    color: coral;
}


a {
    color: black;
    text-decoration: underline;
}

</style>
</head>
<body>

<h2>Service listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">
  <a href="{{route('service.add')}}"><h4>Add Service Record</h4></a>
</div>

<table class="table table-dark table-bordered">

  <tr class="x">
    <th>Id</th>
    <th>Image</th>
    <th>Service Name</th>
    <th>Description</th>
    <th>status</th>
    <th>Action</th>
  </tr>

  @if(isset($getallservice) && !$getallservice->isEmpty())

    @foreach($getallservice as $key=>$v)

   <tr>
      <td>{{$v->id}}</td> <!-- database name -->
      <td>{{$v->image}}</td> <!-- database name -->
      <td>{{$v->service_name}}</td> <!-- database name -->
      <td>{{$v->description}}</td> <!-- database name -->
      <td>
      	@if($v->status == 1)
      	  active
        @else
           inactive
        @endif
    </td>
      <td>
        <a href="{{route('service.edit',$v->id)}}">Edit</a>   
        <a href="{{route('service.delete',$v->id)}}">Delete</a>
      </td>
    </tr>

    @endforeach

  @endif

</table>

  @if(isset($getallservice) && !$getallservice->isEmpty())

<div style="margin-top: 40px; text-align: center;">
  
    {!! $getallservice->links() !!}

</div>
    
  @endif
</body>
</html>




@endsection