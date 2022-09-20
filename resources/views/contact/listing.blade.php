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

<h2>Contact listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">
  <a href="{{route('pages.add')}}"><h4>Add Contact Record</h4></a>
</div>

<table class="table table-dark table-bordered">

  <tr class="x">
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Query</th>
    <th>Number</th>
    <th>Message</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

  @if(isset($getallcontact) && !$getallcontact->isEmpty())

    @foreach($getallcontact as $key=>$v)

    <tr>
      <td>{{$v->id}}</td> <!-- database name -->
      <td>{{$v->name}}</td> <!-- database name -->
      <td>{{$v->email}}</td> <!-- database name -->
      <td>{{$v->query_data}}</td> <!-- database name -->
      <td>{{$v->number}}</td> <!-- database name -->
      <td>{{$v->message}}</td> <!-- database name -->
      <td>
      	@if($v->status == 1)
      	  active
        @else
           inactive
        @endif
      </td>
      <td>
        <a href="{{route('contact.edit',$v->id)}}">Edit</a>   
        <a href="{{route('contact.delete',$v->id)}}">Delete</a>
      </td>
    </tr>

    @endforeach

  @endif

</table>

  @if(isset($getallblog) && !$getallblog->isEmpty())

<div style="margin-top: 40px; text-align: center;">
  
    {!! $getallblog->links() !!}

</div>
    
  @endif
</body>
</html>




@endsection