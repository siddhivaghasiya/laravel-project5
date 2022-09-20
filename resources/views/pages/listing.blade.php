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

img.ab {
                height: 49px;
                width: 75px;
            }


</style>
</head>
<body>

<h2>Pages listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">
  <a href="{{route('pages.add')}}"><h4>Add Pages Record</h4></a>
</div>

<table class="table" id="users-table">
    <thead>
        <tr></tr>
        <tr>
                <th>Id</th>
                <th>name</th>
                <th>title</th>
                <th>url</th>
                <th>image</th>
                <th>shortdescription</th>
                <th>longdescription</th>
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
            url: '{!! route('pages.ajaxlisting') !!}',
            data: function(d) {

            }
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'title'
            },
            {
                data: 'url'
            },
            {
                data: 'image'
            },
            {
                data: 'shortdescription'
            },
            {
                data: 'longdescription'
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
