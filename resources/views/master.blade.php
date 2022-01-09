<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SeneKuy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="d-flex flex-column">
    {{-- <div class="container"> --}}
        {{-- <header class="d-flex flex-wrap  py-3 mb-4 border-bottom">
            <a href="/home" class="text-decoration-none d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark">
                <span class="fs-4">SeneKuy</span>
            </a>

            <ul class="nav col-12 col-md-auto mb-2  mb-md-0 me-auto">
                <li>
                    <a href="/home" class="nav-link px- link-dark">Home</a>
                </li>

                <li class="nav-item-dropdown">
                    <a href="" class="dropdown-toggle nav-link link-dark" role="button" id="categoryDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdownMenuLink">
                        <li><a href="" class="dropdown-item">Cat 1</a></li>
                        <li><a href="" class="dropdown-item">Cat 2</a></li>
                        <li><a href="" class="dropdown-item">Cat 3</a></li>
                    </ul>
                </li>
            </ul> --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded">
                <div class="container">
                  <a class="navbar-brand" href="#">Snekku Logo</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="#">cat 1</a></li>
                          <li><a class="dropdown-item" href="#">cat 2</a></li>
                          <li><a class="dropdown-item" href="#">cat 3</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                      </li>
                    </ul>
                  </div>

                  <div class="cart-and-wish d-flex justify-content-between pe-4">
                      <div class="wish-button">
                        <a href=""><img src="{{asset('assets/heart.png')}}" alt=""></a>
                      </div>
                      <div class="cart-button">
                        <a href=""><img src="{{asset('assets/cart.png')}}" alt=""></a>
                      </div>
                  </div>

                  <div class="profile-icon ps-2">
                    <div class="btn-group">
                        <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{asset('assets/user.png')}}" alt="">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">View Profile</a></li>
                            <li><a class="dropdown-item" href="#">History Transaction</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item fw-bold" href="{{route('login')}}">Login or Register</a></li>
                        </ul>
                      </div>

                  </div>
                </div>
              </nav>



            {{-- <div class="col-md-3 col-lg-2">
                @auth
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome, {{auth()->user()->lastName}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                            <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
                @else
                <a href="/login" class="text-decoration-none">
                    <button class="btn btn-outline-dark me-2">Login</button>
                </a>
                <a href="/register" class="text-decoration-none">
                    <button class="btn btn-warning">Register</button>
                </a>
                @endauth
            </div> --}}
        {{-- </header> --}}
    {{-- </div> --}}


    <main class="flex-shrink-0">
        @yield('content')
    </main>

    <footer class="footer mt-auto py-2 text-center fw-bold">
        SeneKuy © 2021
    </footer>
</body>
</html>
