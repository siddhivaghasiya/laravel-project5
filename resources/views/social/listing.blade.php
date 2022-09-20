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

<h2>Social listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">
  <a href="{{route('social.add')}}"><h4>Add Social Record</h4></a>
</div>

<table class="table table-dark table-bordered">

  <tr class="x">
    <th>Id</th>
    <th>Icon</th>
    <th>Name</th>
    <th>Link</th>
    <th>status</th>
    <th>Action</th>
  </tr>

  @if(isset($getsocial) && !$getsocial->isEmpty())

    @foreach($getsocial as $key=>$v)

   <tr>
      <td>{{$v->id}}</td> <!-- database name -->
      <td>{{$v->icon}}</td> <!-- database name -->
      <td>{{$v->name}}</td> <!-- database name -->
      <td>{{$v->link}}</td> <!-- database name -->
      <td>
      	@if($v->status == 1)
      	  active
        @else
           inactive
        @endif
    </td>
      <td>
        <a href="{{route('social.edit',$v->id)}}">Edit</a>
        <a href="{{route('social.delete',$v->id)}}">Delete</a>
      </td>
    </tr>

    @endforeach

  @endif

</table>

  @if(isset($getsocial) && !$getsocial->isEmpty())

<div style="margin-top: 40px; text-align: center;">

    {!! $getsocial->links() !!}

</div>

  @endif
</body>
</html>




@endsection
