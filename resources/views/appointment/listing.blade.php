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

<h2>Appointment listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">

</div>

<table class="table table-dark table-bordered">

  <tr class="x">
    <th>Id</th>
    <th>Department</th>
    <th>Doctors</th>
    <th>Date</th>
    <th>Time</th>
    <th>Name</th>
    <th>Number</th>
    <th>Message</th>
    <th>Action</th>

  </tr>

  @if(isset($getappointment) && !$getappointment->isEmpty())

    @foreach($getappointment as $key=>$v)


    <?php

    $department = \App\Models\Department::where('id',$v->department)->first();
    $doctors = \App\Models\Doctors::where('id',$v->doctors)->first();

   ?>


   <tr>
      <td>{{$v->id}}</td> <!-- database name -->
      <td>
        @if($department !=null)
        {{$department->title}}
       @else
        -
       @endif
      </td> <!-- database name -->
      <td>
        @if($doctors !=null)
        {{$doctors->name}}
       @else
        -
       @endif
    </td> <!-- database name -->
      <td>{{$v->date}}</td> <!-- database name -->
      <td>{{$v->time}}</td> <!-- database name -->
      <td>{{$v->name}}</td> <!-- database name -->
      <td>{{$v->number}}</td> <!-- database name -->
      <td>{{$v->message}}</td> <!-- database name -->

      <td>
        <a href="{{route('appointment.delete',$v->id)}}">Delete</a>
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
