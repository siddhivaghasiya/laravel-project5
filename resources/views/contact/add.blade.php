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

  <script src="{{asset('adminlt/jquery.validate.min.js')}}"></script>     
  <script src="{{asset('adminlt/additional-methods.min.js')}}"></script>
</head>
<body>

  

<div class="container">
  <h2>Contact Form</h2>
  <form action="{{route('contact.save-add')}}" method="POST"  enctype="multipart/form-data" id="contact">
    
    @csrf

     <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name"  name="name">
    </div>

    <div class="form-group">
      <label >Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>


    <div class="form-group">
      <label >Query:</label>
      <input type="text" class="form-control" id="query_data" placeholder="Enter query" name="query_data">
    </div>

     <div class="form-group">
      <label >Number:</label>
      <input type="text" class="form-control" id="number" placeholder="Enter number" name="number">
    </div>

    <div class="form-group">
      <label >Message:</label>
      <input type="text" class="form-control" id="message" placeholder="Enter message" name="message">
    </div>

   <div class="form-group">
    <label >Status:</label>
    <select class="form-control"  name="status" id="status">
      <option value="">select status</option>
      <option value="1">Active</option>
      <option value="2">Inactive</option>
    </select>
   </div>

    <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{route('contact.listing')}}" class="btn btn-danger">Cancle</a>
</form>
</div>

<script>

  $(document).ready(function() {
    $("#contact").validate({
      rules: { 
        name: {required:true},
        email: {required:true},
        query_data: {required:true},
        number: {required:true},
        message: {required:true},
        status:  {required: true},
      },
      messages: {
        name: { required: "this field is required."},
        email: { required: "this field is required."},
        query_data: { required: "this field is required."},
        number: { required: "this field is required."},
        message: { required: "this field is required."},
        status: { required: "this field is required.."},
     }
    });
  });
</script>            

</body>
</html>



@endsection