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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Dashboard</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link text-white">Logout</a></li>     
            </ul>
        </div>
    </nav>

   <div class="container">
       <div class="row" style="margin-top: 45px">
           <div class="col-md-4 col-md-offset-4 mx-auto">
               <h4>Hello, {{ $LoggedUserInfo->name}} </h4>             
           </div>
       </div>
   </div> 
</body>
</html>