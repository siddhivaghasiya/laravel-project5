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

tr:nth-child(even) {
  background-color: #dddddd;
}

td {
    background-color: lightseagreen;
}

a {
    color: black;
    text-decoration: underline;
}

</style>
</head>
<body>

<h2>About Us listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">
  <a href="{{route('about.add')}}"><h4>Add About Us Record</h4></a>
</div>

<table>

  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Description</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

  @if(isset($getalltestimonial) && !$getalltestimonial->isEmpty())

    @foreach($getalltestimonial as $key=>$v)

    <tr>
      <td>{{$v->id}}</td> <!-- database name -->
      <td>{{$v->title}}</td>
      <td>{{$v->description}}</td>
      <td>
      	@if($v->status == 1)
      	  active
        @else
           inactive
        @endif
    </td>
      <td>
        <a href="">Edit</a>   
        <a href="">Delete</a>
      </td>
    </tr>

    @endforeach

  @endif

</table>

  @if(isset($getalltestimonial) && !$getalltestimonial->isEmpty())

<div style="margin-top: 40px; text-align: center;">
  
    <!-- {!! $getalltestimonial->links() !!} -->
    {!! $getalltestimonial->render() !!}              <!-- for pagination -->

</div>
    
  @endif
</body>
</html>




@endsection