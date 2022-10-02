<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-secondary" style="background-image: url('{{asset('back/backlog.webp')}}'); height:90vh;">
        <div class="container mt-lg-5 mt-sm-4" >
          <div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}    
                </div>     
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach    
                    </ul>  
                </div> 
            @endif
          </div>
                  <div class="row mt-lg-5 mt-sm-4">
                    <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 mt-lg-4 mt-sm-4  bg-white p-3" style="border-radius: 30px">
      
                      <p class="text-center h1 fw-bold mx-md-4">Log In</p>
      
                      <form class="mx-md-4 mt-5" method="POST" action="/signin">
                        @csrf
      
                        <div class="d-flex flex-row align-items-center mb-1">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw mb-4"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" name="email" id="email" class="form-control" />
                            <label class="form-label" for="email">Your Email</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-1">
                          <i class="fas fa-lock fa-lg me-3 fa-fw mb-4"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" name="password" id="password" class="form-control" />
                            <label class="form-label" for="password">Password</label>
                          </div>
                        </div>

                        <div class="d-flex justify-content-center mb-1">
                            <a href="/register">Create a new account</a>
                        </div>
      
                        <div class="d-flex justify-content-center mx-4 mb-2 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg">Log In</button>
                        </div>
                      </form>
      
                    </div>
                  </div>
            
        </div>
</body>
</html>