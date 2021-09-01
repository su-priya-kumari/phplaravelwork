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
            <a href="#" class="navbar-brand"></a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ route('loginpage') }}" class="nav-link text-white">Login</a></li>     
                <li class="nav-item"><a href="{{ route('registerpage') }}" class="nav-link text-white">Register</a></li>     
            </ul>
        </div>
    </nav>

    <div class="jumbotron rounded-0" style="background-image:url('release-notes.jpg');height:1100px">
       <div class="row">
           <div class="col-md-4 col-md-offset-4 mx-auto">
               <h4 class="mt-5">Welcome Laravel Developers</h4>   
               <p>Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.</p>          
           </div>
       </div>
   </div> 
</body>
</html>