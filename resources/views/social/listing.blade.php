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

<table class="table" id="users-table">
    <thead>
        <tr></tr>
        <tr>
                <th>Id</th>
                <th>icon</th>
                <th>name</th>
                <th>link</th>
                <th>status</th>
                <th>Action</th>
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
            url: '{!! route('social.ajaxlisting') !!}',
            data: function(d) {

            }
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'icon'
            },
            {
                data: 'name'
            },
            {
                data: 'link'
            },
            {
                data: 'status'
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
