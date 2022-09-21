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
            <h2>Contact Form</h2>
            {!! Form::open([
                'url' => route('contact.save-add'),
                'id' => 'contact',
                'method' => 'post',
                'enctype' => 'multipart/form-data',
            ]) !!}

            @csrf

            <div class="form-group">
                <label>Name:</label>
                {!! Form::text('name', null, [
                    'id' => 'name',
                    'placeholder' => 'Enter name',
                    'class' => 'form-control',
                ]) !!}
            </div>

            <div class="form-group">
                <label>Email:</label>
                {!! Form::email('email', null, [
                    'id' => 'email',
                    'placeholder' => 'Enter email',
                    'class' => 'form-control',
                ]) !!}
            </div>

            <div class="form-group">
                <label>Query:</label>
                {!! Form::text('query_data', null, [
                    'id' => 'query_data',
                    'placeholder' => 'Enter your query',
                    'class' => 'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                <label>Message:</label>
                {!! Form::text('message', null, [
                    'id' => 'message',
                    'placeholder' => 'Enter your message',
                    'class' => 'form-control',
                ]) !!}
            </div>

            <div class="form-group">
                <label> Number:</label>
                {!! Form::number('number', null, [
                    'id' => 'number',
                    'placeholder' => 'Enter number',
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

            <a href="{{ route('contact.listing') }}" class="btn btn-danger">Cancle</a>

            {!! Form::close() !!}
        </div>

        <script>
            $(document).ready(function() {
                $("#contact").validate({
                    rules: {
                        name: {
                            required: true
                        },
                        email: {
                            required: true
                        },
                        query_data: {
                            required: true
                        },
                        number: {
                            required: true
                        },
                        message: {
                            required: true
                        },
                        status: {
                            required: true
                        },
                    },
                    messages: {
                        name: {
                            required: "this field is required."
                        },
                        email: {
                            required: "this field is required."
                        },
                        query_data: {
                            required: "this field is required."
                        },
                        number: {
                            required: "this field is required."
                        },
                        message: {
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
