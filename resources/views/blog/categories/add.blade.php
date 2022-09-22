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
            <h2>Categories Form</h2>


            {!! Form::open([
                'url' => route('categories.save-add'),
                'id' => 'categories',
                'method' => 'post',
                'enctype' => 'multipart/form-data',
            ]) !!}

            @csrf



            <div class="form-group">
                <label>Ctegories:</label>
                {!! Form::text('categories', null, [
                    'id' => 'categories',
                    'placeholder' => 'Enter categories',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('categories'))
                    <span class="text-danger">{{ $errors->first('categories') }}</span>
                @endif
            </div>



            <div class="form-group">
                <label>Status:</label>
                {!! Form::select('status', ['1' => 'Active', '2' => 'Inactive'], null, [
                    'id' => 'status',
                    'placeholder' => 'select status',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>

            {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

            <a href="{{ route('categories.listing') }}" class="btn btn-danger">Cancle</a>

            {!! Form::close() !!}

    </body>

    </html>
@endsection
