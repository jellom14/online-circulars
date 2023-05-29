<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Laravel 8 - Add Category
    </div>
    <div class="card-body">
      <form name="create-category" id="create-category" method="post" action="{{url('category-form')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Category</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">ID</label>
          <input type="text" id="id" name="id" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <a href = "create-staff">Staff</a>
      <a href = "create-student">Student</a>
      <a href = "create-category">Category</a>
      <a href = "create-circular">Circular</a>
    </div>
  </div>
</div>  
</body>
</html>