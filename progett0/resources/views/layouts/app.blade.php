<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <link href="{{asset('css\app.css')}}" rel = "stylesheet" />
    <title>@yield ('title','online store elena galfrè')</title>    
  </head>
  
  <body>
    <!--header-->
    <nav class = "navbar navbar-expand-lg navbar-dark bg-secondary py-4">
      <div class = "container">
        <a class = "navbar-brand" href="{{route('home.index')}}"> Online Store</a>
        <button class = "navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" 
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class ="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class ="navbar-nav ms-auto">
                <a class ="nav-link active" href="{{route('home.index')}}">Home</a>
                <a class ="nav-link active" href="{{route('home.about')}}">About</a>
                <a class ="nav-link active" href="{{route('product.index')}}">Prodotti</a>
                <a class ="nav-link active" href="{{route('cart.index')}}">Carrello</a>
                <a class ="nav-link active" href="{{route('myaccount.orders')}}">Ordini</a>
                
                 <!-- <i class ="bi bi-cart" ></i>-->
                
                @if(Auth::user() && Auth::user()->getRole()=='admin')
                  <a class ="nav-link active" href="{{route('admin.home.index')}}">Admin</a>
                @endif

                @guest
                <a class ="nav-link active" href="{{route('login')}}">Login</a>
                <a class ="nav-link active" href="{{route('register')}}">Register</a>
                @else
                <form id="logout" action="{{route('logout')}}" method="POST">
                  <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">Logout</a>
                @csrf
                </form>
                @endguest

              </div>
          </div>
      </div>
    </nav>
    
   

    <header class = "masthead bg-light text-secondary text-center py-4">
      <div class="container d-flex align-items-center flex-column">
        <h1> @yield('subtitle','Welcome in our e-shop')</h1>
      </div>
    </header>

    <div class = "container my-4">
      @yield('content','no immagines')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>




   <!--footer-->

   <!--footer-->
  </body>

</html>