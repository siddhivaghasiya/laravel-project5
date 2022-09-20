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
  <h2>Department Form</h2>
  <form action="{{route('department.save-create')}}" method="POST"  enctype="multipart/form-data" id="department">
    
    @csrf

     <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control" id="image"  name="image">
    </div>

    <div class="form-group">
      <label >Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
    </div>


    <div class="form-group">
      <label >Description:</label>
      <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
    </div>

    <div class="form-group">
      <label >Small Description:</label>
      <input type="text" class="form-control" id="smalldescription" placeholder="Enter small description" name="smalldescription">
    </div>

    <div class="form-group">
      <label >Number:</label>
      <input type="text" class="form-control" id="number" placeholder="Enter number" name="number">
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
      <a href="{{route('department.listing')}}" class="btn btn-danger">Cancle</a>
</form>
</div>

<script>

  $(document).ready(function() {
    $("#department").validate({
      rules: { 
        image: {required:true},
        title: {required:true},
        description: {required:true},
        smalldescription: {required:true},
        number: {required:true},
        status:  {required: true},
      },
      messages: {
        image: { required: "this field is required."},
        title: { required: "this field is required."},
        description: { required: "this field is required."},
        smalldescription: { required: "this field is required."},
        number: { required: "this field is required."},
        status: { required: "this field is required.."},
     }
    });
  });
</script>            

</body>
</html>



@endsection