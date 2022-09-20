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
  <h2>Social Form</h2>
  <form action="{{route('social.save-add')}}" method="POST"  enctype="multipart/form-data" id="social">

    @csrf

     <div class="form-group">
      <label >Icon:</label>
      <input type="text" class="form-control" id="icon"  name="icon" placeholder="Enter icon">
    </div>

    <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>

    <div class="form-group">
      <label >Link:</label>
      <input type="text" class="form-control" id="link" placeholder="Enter link" name="link">
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
      <a href="{{route('social.listing')}}" class="btn btn-danger">Cancle</a>
</form>
</div>

<script>

  $(document).ready(function() {
    $("#social").validate({
      rules: {
        icon: {required:true},
        name: {required:true},
        link: {required:true},
        status:  {required: true},
      },
      messages: {
        icon: { required: "this field is required."},
        name: { required: "this field is required."},
        link: { required: "this field is required."},
        status: { required: "this field is required.."},
     }
    });
  });
</script>

</body>
</html>



@endsection
