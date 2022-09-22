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
            <h2>Edit Social Form</h2>
            {!! Form::model($editdata, [
                'url' => route('social.save-edit', $editdata->id),
                'id' => 'social',
                'method' => 'post',
                'enctype' => 'multipart/form-data',
            ]) !!}

            @csrf

            <div class="form-group">
                <label>Icon:</label>
                {!! Form::text('icon', null, [
                    'id' => 'icon',
                    'placeholder' => 'Enter icon',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('icon'))
                    <span class="text-danger">{{ $errors->first('icon') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Name:</label>
                {!! Form::text('name', null, [
                    'id' => 'name',
                    'placeholder' => 'Enter name',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Link:</label>
                {!! Form::text('link', null, [
                    'id' => 'link',
                    'placeholder' => 'Enter link',
                    'class' => 'form-control',
                ]) !!}
                   @if ($errors->has('link'))
                   <span class="text-danger">{{ $errors->first('link') }}</span>
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

            <a href="{{ route('social.listing') }}" class="btn btn-danger">Cancle</a>

            {!! Form::close() !!}
        </div>



    </body>

    </html>
@endsection
