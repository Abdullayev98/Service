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
<body class="bg-secondary"  style="background-image: url('{{asset('back/backreg.jpg')}}'); height:90vh;">
        <div class="container" >
            <div class="mt-3">
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
                  <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 mt-lg-4 mt-sm-4  bg-white p-3" style="border-radius: 30px">
      
                      <p class="text-center h1 fw-bold mx-md-4">Sign up</p>
      
                      <form class="mx-md-4 mt-5" action="{{ route('reg') }}" method="POST" >
                        @csrf
      
                        <div class="d-flex flex-row align-items-center mb-1">
                          <i class="fas fa-user fa-lg me-3 fa-fw mb-4 "></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="name" class="form-control" name="name" />
                            <label class="form-label" for="name">Your Name</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-1">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw mb-4"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" id="email" class="form-control" name="email" />
                            <label class="form-label" for="email">Your Email</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-1">
                          <i class="fas fa-lock fa-lg me-3 fa-fw mb-4"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="password" class="form-control" name="password" />
                            <label class="form-label" for="password">Password</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-1">
                          <i class="fas fa-key fa-lg me-3 fa-fw mb-4"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="form3Example4cd" class="form-control" name="password_confirmation" />
                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                          </div>
                        </div>
      
                        <div class="d-flex justify-content-center mb-1">
                            <a href="/login">I have already account !!!</a>
                        </div>
      
                        <div class="d-flex justify-content-center mx-4 mb-2 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                      </form>
      
                    </div>
                  </div>
            
        </div>
</body>
</html>