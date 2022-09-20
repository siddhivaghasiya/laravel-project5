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
  <h2>Tags Form</h2>
  <form action="{{route('tag.save-add')}}" method="POST" id="tages">
    
    @csrf

    <div class="form-group">
      <label >Tags:</label>
      <input type="text" class="form-control" id="tags" placeholder="Enter tags" name="tags">
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
      <a href="{{route('tag.listing')}}" class="btn btn-danger">Cancle</a>
</form>
</div>

<script>

  $(document).ready(function() {
    $("#tages").validate({
      rules: { 
        tags: {required:true},
        status:  {required: true},
      },
      messages: {
        tags: { required: "this field is required."},
        status: { required: "this field is required.."},
     }
    });
  });
</script>            

</body>
</html>



@endsection