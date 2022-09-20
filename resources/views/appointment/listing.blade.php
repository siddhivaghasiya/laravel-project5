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

<table class="table" id="users-table">
    <thead>
        <tr></tr>
        <tr>
                <th>Id</th>
                <th>Department</th>
                <th>Doctors</th>
                <th>Date</th>
                <th>Time</th>
                <th>Name</th>
                <th>Number</th>
                <th>Message</th>
                <th>Action </th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>


<script>
    var oTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        responsive: true,
        ajax: {
            url: '{!! route('appointment.ajaxlisting') !!}',
            data: function(d) {

            }
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'department'
            },
            {
                data: 'doctors'
            },
            {
                data: 'date'
            },
            {
                data: 'time'
            },
            {
                data: 'name'
            },
            {
                data: 'number'
            },
            {
                data: 'message'
            },
            {
                data: 'action'
            },

        ]
    });
</script>
</body>
</html>




@endsection
