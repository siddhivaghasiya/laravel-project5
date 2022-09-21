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
             <h2>Edit Blog Form</h2>

             {!! Form::model($editdata,[
                 'url' => route('blog.save-edit',$editdata->id),
                 'id' => 'blog',
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
                 <label>Title:</label>
                 {!! Form::text('title',null, [
                     'id' => 'title',
                     'placeholder' => 'Enter title',
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
             <?php

                    if ($editdata->popular_post == 1) {

                        $tRUEFalse = true;
                    }else{

                        $tRUEFalse = false;
                    }

             ?>
             <div class="form-group">
                 <label>popular_post</label>
                 {!! Form::checkbox('p_post', 1, $tRUEFalse , [
                     'id' => 'p_post',
                 ]) !!}
             </div>

             <div class="form-group">
                 <label>Categories:</label>
                 {!! Form::select('categories', $getallcategories, null, [
                     'id' => 'categories',
                     'placeholder' => 'select categories',
                     'class' => 'form-control',
                 ]) !!}
             </div>

             <div class="form-group">
                 <label>Tags:</label>
                 {!! Form::select('tags', $getalltags, null, [
                     'id' => 'tags',
                     'placeholder' => 'select tags',
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

             <a href="{{ route('blog.listing') }}" class="btn btn-danger">Cancle</a>

             {!! Form::close() !!}
         </div>

         <script>
             $(document).ready(function() {
                 $("#blog").validate({
                     rules: {
                         image: {
                             required: true
                         },
                         title: {
                             required: true
                         },
                         description: {
                             required: true
                         },
                         categories: {
                             required: true
                         },
                         tags: {
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
                         title: {
                             required: "this field is required."
                         },
                         description: {
                             required: "this field is required."
                         },
                         categories: {
                             required: "this field is required."
                         },
                         tags: {
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
