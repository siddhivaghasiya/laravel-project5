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

img {
    width: 50px;
}
</style>
</head>
<body>

<h2>Achievement listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">
  <a href="{{route('achievement.add')}}"><h4>Add Achievement Record</h4></a>
</div>

<table class="table table-dark table-bordered">

  <tr class="x">
    <th>Id</th>
    <th>Image</th>
    <th>status</th>
    <th>Action</th>
  </tr>

  @if(isset($getachievement) && !$getachievement->isEmpty())

    @foreach($getachievement as $key=>$v)



    <tr>
      <td>{{$v->id}}</td> <!-- database name -->
      <td><img src="{{asset('uploads/achievement/'.$v->image)}}" alt=""></td> <!-- database name -->
      <td>
      	@if($v->status == 1)
      	  active
        @else
           inactive
        @endif
    </td>
      <td>
        <a href="{{route('achievement.edit',$v->id)}}">Edit</a>
        <a href="{{route('achievement.delete',$v->id)}}">Delete</a>
      </td>
    </tr>

    @endforeach

  @endif

</table>

  @if(isset($getachievement) && !$getachievement->isEmpty())

<div style="margin-top: 40px; text-align: center;">

    {!! $getachievement->links() !!}

</div>

  @endif
</body>
</html>




@endsection
