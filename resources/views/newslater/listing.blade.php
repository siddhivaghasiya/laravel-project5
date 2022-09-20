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

<h2>Newslater listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">

</div>

<table class="table table-dark table-bordered">

  <tr class="x">
    <th>Id</th>
    <th>email</th>
    <th>Action</th>
  </tr>

  @if(isset($getnewslater) && !$getnewslater->isEmpty())

    @foreach($getnewslater as $key=>$v)

   <tr>
      <td>{{$v->id}}</td> <!-- database name -->
      <td>{{$v->email}}</td> <!-- database name -->
      <td>
        <a href="{{route('newslater.delete',$v->id)}}">Delete</a>
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
