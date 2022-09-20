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

<h2>Pages listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">
  <a href="{{route('pages.add')}}"><h4>Add Pages Record</h4></a>
</div>

<table class="table table-dark table-bordered">

  <tr class="x">
    <th>Id</th>
    <th>Name</th>
    <th>Title</th>
    <th>Url</th>
    <th>Image</th>
    <th>Short Description</th>
    <th>Long Description</th>
    <th>status</th>
    <th>Action</th>
  </tr>

  @if(isset($getallpages) && !$getallpages->isEmpty())

    @foreach($getallpages as $key=>$v)

   <tr>
      <td>{{$v->id}}</td> <!-- database name -->
      <td>{{$v->name}}</td> <!-- database name -->
      <td>{{$v->title}}</td> <!-- database name -->
      <td>{{$v->url}}</td> <!-- database name -->
      <td>{{$v->image}}</td> <!-- database name -->
      <td>{{$v->shortdescription}}</td> <!-- database name -->
      <td>{{$v->longdescription}}</td> <!-- database name -->
      <td>
      	@if($v->status == 1)
      	  active
        @else
           inactive
        @endif
    </td>
      <td>
        <a href="{{route('pages.edit',$v->id)}}">Edit</a>   
        <a href="{{route('pages.delete',$v->id)}}">Delete</a>
      </td>
    </tr>

    @endforeach

  @endif

</table>

  @if(isset($getallpages) && !$getallpages->isEmpty())

<div style="margin-top: 40px; text-align: center;">
  
    {!! $getallpages->links() !!}

</div>
    
  @endif
</body>
</html>




@endsection