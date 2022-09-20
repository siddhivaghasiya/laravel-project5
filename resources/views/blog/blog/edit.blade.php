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
  <h2>Blog Form</h2>
  <form action="{{route('blog.save-edit')}}" method="POST"  enctype="multipart/form-data" id="blog">
    
    @csrf

    <input type="hidden" value="{{$editdata->id}}" name="blog" id="blog">

     <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control"  id="image"  name="image">
    </div>

    <div class="form-group">
      <label >Title:</label>
      <input type="text" class="form-control" value="{{$editdata->title}}" id="title" placeholder="Enter title" name="title">
    </div>


    <div class="form-group">
      <label >Description:</label>
      <input type="text" class="form-control" value="{{$editdata->description}}" id="description" placeholder="Enter description" name="description">
    </div>

    <div class="form-group">
      <label >popular post:</label>
      <input type="checkbox" id="p_post" name="p_post" value="1" @if($editdata->popular_post == 1) checked @endif >
    </div>

   <div class="form-group">
    <label >Categories:</label>
    <select class="form-control"  name="categories" id="categories">
      <option value="">select Categories</option>

      @if(isset($getallcategories) && !$getallcategories->isEmpty())

        @foreach($getallcategories as $key=>$v)
           <option value="{{$v->id}}" @if($editdata->categories == $v->id
           	) selected @endif>{{$v->categories}}</option>
        @endforeach

      @endif
    </select>
   </div>

   <div class="form-group">
    <label >Tags:</label>
    <select class="form-control"  name="tags" id="tags">
      <option value="">select Tags</option>
       
        @if(isset($getalltags) && !$getalltags->isEmpty())

        @foreach($getalltags as $key=>$v)
           <option value="{{$v->id}}"  @if($editdata->tags == $v->id
           	) selected @endif>{{$v->tags}}</option>
        @endforeach

      @endif   

    </select>
   </div>

   <div class="form-group">
    <label >Status:</label>
    <select class="form-control"  name="status" id="status">
      <option value="">select status</option>
      <option value="1"  @if($editdata->status == 1
           	) selected @endif>Active</option>
      <option value="2" @if($editdata->status == 2
           	) selected @endif>Inactive</option>
    </select>
   </div>

    <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{route('categories.listing')}}" class="btn btn-danger">Cancle</a>
</form>
</div>

<script>

  $(document).ready(function() {
    $("#blog").validate({
      rules: { 
        image: {required:true},
        title: {required:true},
        description: {required:true},
        categories: {required:true},
        tags: {required:true},
        status:  {required: true},
      },
      messages: {
        image: { required: "this field is required."},
        title: { required: "this field is required."},
        description: { required: "this field is required."},
        categories: { required: "this field is required."},
        tags: { required: "this field is required."},
        status: { required: "this field is required.."},
     }
    });
  });
</script>            

</body>
</html>



@endsection