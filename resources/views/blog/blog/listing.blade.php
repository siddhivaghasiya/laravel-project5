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

<h2>Blogs listing</h2>

<div style="margin-top:20px; margin-bottom:40px;">
  <a href="{{route('blog.add')}}"><h4>Add Blogs Record</h4></a>
</div>

<table class="table" id="users-table">
    <thead>
        <tr></tr>
        <tr>
                <th>Id</th>
                <th>image</th>
                <th>title</th>
                <th>description</th>
                <th>popular post</th>
                <th>categories</th>
                <th>tags</th>
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
            url: '{!! route('blog.ajaxlisting') !!}',
            data: function(d) {

            }
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'image'
            },
            {
                data: 'title'
            },
            {
                data: 'description'
            },
            {
                data: 'popular_post'
            },
            {
                data: 'categories'
            },
            {
                data: 'tags'
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
