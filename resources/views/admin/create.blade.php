<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateUser</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  @include('components/navbar')

  @if(!empty($information))
  <div class="alert alert-primary" role="alert">
    {{$information}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="false">&times;</span>
    </button>
  </div>    
  @endif

<div class="container p-4" style="margin-top:130px;" > 
  <form method="POST" action="create" class="card card-body col-md-4 offset-md-4" style="width:400px;">
    @csrf
    <div class="form-group">
      <input
          type="text"
          name="username" 
          class="form-control"
          placeholder="username"
          autofocus
       /> 
    </div>

    <div class="form-group">
      <input
          type="email"
          name="email" 
          class="form-control"
          placeholder="Enter email"
       /> 
    </div>

    <div class="form-group">
        <input
          type="password"
          name="password"
          class="form-control"
          placeholder="Password"
        />
    </div>

    <button 
         type="submit" 
         class="btn btn-primary">
         Create user
    </button>    
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>