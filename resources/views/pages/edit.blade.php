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
  <h2>Edit Pages Form</h2>
  <form action="{{route('pages.save-edit',$editdata->id)}}" method="POST"  enctype="multipart/form-data" id="pages">
    
    @csrf

    <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control" value="{{$editdata->name}}" id="name" placeholder="Enter name" name="name">
    </div>

     <div class="form-group">
      <label >Secondary title:</label>
      <input type="text" class="form-control" value="{{$editdata->title}}" id="title" placeholder="Enter title" name="title">
    </div>

    <div class="form-group">
      <label >Redirect Url:</label>
      <input type="url" class="form-control" value="{{$editdata->url}}" placeholder="Enter url"  id="url"  name="url">
    </div>

    <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control" id="image"  name="image">
    </div>

    <div class="form-group">
      <label >Short Description:</label>
      <textarea  class="form-control" id="shortdescription" placeholder="Enter description" name="shortdescription">{{$editdata->shortdescription}}</textarea>
    </div>

    <div class="form-group">
      <label >Long Description:</label>
      <textarea  class="form-control"  id="longdescription" placeholder="Enter description" name="longdescription">{{$editdata->longdescription}}</textarea>
    </div>

     <div class="form-group">
      <label >Status:</label>
      <select class="form-control"  name="status" id="status">
        <option value="">select status</option>
        <option value="1" @if($editdata->status == 1) selected @endif>Active</option>
        <option value="2" @if($editdata->status == 2) selected @endif>Inactive</option>
      </select>
     </div>

    <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{route('pages.listing')}}" class="btn btn-danger">Cancle</a>
</form>
</div>

<script>

  $(document).ready(function() {
    $("#pages").validate({
      rules: { 
        name: {required:true},
        title: {required:true},
        url: {required:true},
        image: {required:true},
        shortdescription: {required:true},
        longdescription: {required:true},
        status:  {required: true},
      },
      messages: {
        name: { required: "this field is required."},
        title: { required: "this field is required."},
        url: { required: "this field is required."},
        image: { required: "this field is required."},
        shortdescription: { required: "this field is required."},
        longdescription: { required: "this field is required."},
        status: { required: "this field is required.."},
     }
    });
  });
</script>            

</body>
</html>



@endsection