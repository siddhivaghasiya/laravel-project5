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
            <h2>Department Form</h2>

            {!! Form::model($geteditdata, [
                'url' => route('department.save-edit', $geteditdata->id),
                'id' => 'department',
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
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Title:</label>
                {!! Form::text('title', null, [
                    'id' => 'title',
                    'placeholder' => 'Enter title',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label> Description:</label>
                {!! Form::text('description', null, [
                    'id' => 'description',
                    'placeholder' => 'Enter description',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Small Description:</label>
                {!! Form::text('small_description', null, [
                    'id' => 'small_description',
                    'placeholder' => 'Enter small description',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('small_description'))
                    <span class="text-danger">{{ $errors->first('small_description') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label> Number:</label>
                {!! Form::number('number', null, [
                    'id' => 'number',
                    'placeholder' => 'Enter number',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
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

            <a href="{{ route('department.listing') }}" class="btn btn-danger">Cancle</a>

            {!! Form::close() !!}
        </div>



    </body>

    </html>
@endsection
