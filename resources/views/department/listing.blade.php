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

            td,
            th {
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

        <h2>Department listing</h2>

        <div style="margin-top:20px; margin-bottom:40px;">
            <a href="{{ route('department.create') }}">
                <h4>Add Department Record</h4>
            </a>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <table class="table" id="users-table">
                        <thead>
                            <tr></tr>
                            <tr>
                                <th>Id</th>
                                <th>title</th>
                                <th>Description</th>
                                <th>Small_description</th>
                                <th>Number</th>
                                <th>image</th>
                                <th>status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <script>
            var oTable = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                responsive: true,
                ajax: {
                    url: '{!! route('department.yajara-listing') !!}',
                    data: function(d) {

                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'small_description'
                    },
                    {
                        data: 'number'
                    },
                    {
                        data: 'image'
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
