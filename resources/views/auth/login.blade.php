<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
   <div class="container">
       <div class="row" style="margin-top: 45px">
           <div class="col-md-4 col-md-offset-4 mx-auto">
               <h4>User Login</h4>
               <hr>
               <form action="{{ route('auth.check') }}" method="post">
                   @csrf
                   <div class="results">
                    @if (Session::get('fail'))
                        <div class="alert alert-success">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                 </div>  
                   <div class="mb-3">
                       <label for="email">Email</label>
                       <input type="text" class="form-control" name="email" placeholder="Enter email"  value="{{old('email')}}">
                       <span class="text-danger">@error('email'){{$message}}@enderror</span>
                   </div>
                   <div class="mb-3">
                       <label for="password">Password</label>
                       <input type="password" class="form-control" name="password" placeholder="Enter password" >
                       <span class="text-danger">@error('password'){{$message}}@enderror</span>
                   </div>
                   <div class="mb-3">
                       <button type="submit" class="btn btn-primary btn-block">Login</button>
                   </div>
                   <hr>
                   <a href="register">Create an new account?</a>
               </form>
           </div>
       </div>
   </div> 
</body>
</html>