@extends('adminlt.layout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <style>
            form {
                margin-top: 27px;
                margin-right: 250px;
            }

            .card.card-primary {
                margin-top: 40px;
            }

            .container {
                width: 1046px;
            }
        </style>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script src="{{ asset('adminlt/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('adminlt/additional-methods.min.js') }}"></script>
    </head>

    <body>



        <div class="container">
            <h2>Service Form</h2>
            {!! Form::open([
                'url' => route('service.save-add'),
                'id' => 'service',
                'method' => 'post',
                'enctype' => 'multipart/form-data',
            ]) !!}

            @csrf

            <div class="form-group">
                <label>Image:</label>
                {!! Form::file('image', null, [
                    'id' => 'image',
                    'class' => 'form-control',
                ]) !!}
            </div>

            <div class="form-group">
                <label>service Name:</label>
                {!! Form::text('service_name', null, [
                    'id' => 'service_name',
                    'placeholder' => 'Enter service name',
                    'class' => 'form-control',
                ]) !!}
            </div>

            <div class="form-group">
                <label> Description:</label>
                {!! Form::text('description', null, [
                    'id' => 'description',
                    'placeholder' => 'Enter description',
                    'class' => 'form-control',
                ]) !!}
            </div>

            <div class="form-group">
                <label>Status:</label>
                {!! Form::select('status', ['1' => 'Active', '2' => 'Inactive'], null, [
                    'id' => 'status',
                    'placeholder' => 'select status',
                    'class' => 'form-control',
                ]) !!}
            </div>

            {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

            <a href="{{ route('service.listing') }}" class="btn btn-danger">Cancle</a>

            {!! Form::close() !!}
        </div>

        <script>
            $(document).ready(function() {
                $("#service").validate({
                    rules: {
                        image: {
                            required: true
                        },
                        name: {
                            required: true
                        },
                        description: {
                            required: true
                        },
                        status: {
                            required: true
                        },
                    },
                    messages: {
                        image: {
                            required: "this field is required."
                        },
                        name: {
                            required: "this field is required."
                        },
                        description: {
                            required: "this field is required."
                        },
                        status: {
                            required: "this field is required.."
                        },
                    }
                });
            });
        </script>

    </body>

    </html>
@endsection
