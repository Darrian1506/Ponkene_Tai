<!DOCTYPE html>
<html lang="es" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponkene Tai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
</head>
<body>
    <nav class="navbar px-4 " style="background-color: #083d25">
        <a href="/" class="navbar-brand px-4" href="/">
            <img src="{{URL::asset('/images/logoponkene.jpg')}}" width="100px" height="60px" class="img-responsive rounded-2" alt="Ponkene Logo" >
        </a>
        <a class="nav-item nav-link  border rounded-top  align-items-start"  style="color: white;font-size: 1.5rem"href="">Nosotros</a>
        <a class="nav-item nav-link  border rounded-top  align-items-start"  style="color: white;font-size: 1.5rem"href="">Carta</a>
        <a class="nav-item nav-link  border rounded-top  align-items-start"  style="color: white;font-size: 1.5rem"href="{{route('reserva.create')}}">Reserva</a>
        <a class="nav-item nav-link  border rounded-top  align-items-start" style="color: white;font-size: 1.5rem" href="{{route('empleado.login-form')}}">Empleados</a>
        
        
    </nav>
    
    
    <div class="container-fluid">
        @yield('sub-navbar')
    </div>
    <div class="container-fluid">
        @yield('main')
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>