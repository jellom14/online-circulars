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
      Laravel 8 - Add Role
    </div>
    <div class="card-body">
      <form name="create-role" id="create-role" method="post" action="{{url('role-form')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Role</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>