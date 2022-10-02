<header class="p-3 bg-dark text-white">
<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a href="/" class="d-flex align-items-center mb-2 me-5 mb-lg-0 text-white text-decoration-none">
        <img src="{{asset('logo/download.png')}}" width="50px" class="rounded-pill" alt="">
    </a>

    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
        <li><a href="{{ route('currency') }}" class="nav-link px-2 text-white">Currencies</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
        <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
    </ul>
    @auth
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>
    @endauth
    
    @guest
    <div class="text-end">
        <button type="button" class="btn btn-outline-light me-2"><a href="{{route('login')}}">Login</a></button>
        <button type="button" class="btn btn-outline-warning"><a href="{{route('reg')}}">Sign-up</a></button>
    </div>
    @endguest
    
    @auth
    
    <div>
        <button type="button" class="btn bg-light p-0">
            <a href="{{ url('logout') }}" class="d-block bg-light text-decoration-none show"  >
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle ">
                <h6 class="d-inline p-2">Logout</h6>
            </a>
        </button>
       
    @endauth
    
</div>
</header>