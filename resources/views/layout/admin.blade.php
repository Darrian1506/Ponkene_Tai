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
    @auth

    <nav class="navbar navbar-expand-lg  border-bottom d-flex" style="background-color: #083d25">
        <div class="container-fluid ">
            <a class="navbar-brand px-4 order-1">
                <img src="{{URL::asset('/images/logoponkene.jpg')}}" width="100px" height="60px" class="img-responsive rounded-2" alt="Ponkene Logo" >
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse   d-flex justify-content-between order-2" id="navbarSupportedContent">
                <ul class="navbar-nav  nav-justify  mb-2 mb-lg-0">
                    <li class="nav item mx-2">
                        <a href="{{route('empleado.index')}}" class="nav-link border rounded-top align-items-start " style="color: white;font-size: 1rem">
                            Empleados
                        </a>
                    </li>
                    <li class="nav item mx-2">
                        <a href="{{route('reserva.index')}}" class="nav-link  border rounded-top align-items-start " style="color: white;font-size: 1rem">
                            Reservas
                        </a>
                    </li>
                    <li class="nav item  mx-2">
                        <a href="#" class="nav-link  border rounded-top align-items-start " style="color: white;font-size: 1rem">
                            Caja
                        </a>
                    </li>
                    <li class="nav-item dropdown  mx-2">
                        <a class="nav-link dropdown-toggle border rounded-top align-items-start" href="#"  id="navbarDropdown" style="color: white;font-size: 1rem" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Carta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('insumo.index')}}">Insumos</a>
                            <a class="dropdown-item" href="{{route('plato.index')}}">Platos</a>
                            <a class="dropdown-item" href="{{route('promocion.index')}}">Promociones</a>
                        </ul>
                    </li>
                    <li class="nav item mx-2">
                        <a href="{{route('mesa.index')}}" class="nav-link  border rounded-top align-items-start " style="color: white;font-size: 1rem">
                            Mesas    
                        </a>
                    </li>
                    <li class="nav item  mx-2">
                        <a href="#" class="nav-link  border rounded-top align-items-start " style="color: white;font-size: 1rem">
                            Informes    
                        </a>
                    </li>
                    <li class="nav-item dropdown  mx-2">
                        <a class="nav-link dropdown-toggle border rounded-top align-items-start" href="#"  id="navbarDropdown" style="color: white;font-size: 1rem" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Comandas
                        </a>
                        <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('cocina.index')}}">Cocina</a>
                            <a class="dropdown-item" href="{{--route('barra.index')--}}">Barra</a>
                            <a class="dropdown-item" href="{{--route('Caja.index')--}}">Caja</a>
                        </ul>
                    </li>
                </ul>
                
            </div>
            <li class="nav-item order-3 list-unstyled">
                <div class="flex-shrink ">
                    <span class="px-4 align-center" style="color: white;font-size: 1.5rem">{{Auth::user()->nombre}} {{Auth::user()->apellido}}</span>
                    <a href="{{route('empleado.logout')}}" class="btn btn-danger mx-2">Cerrar Sesión</a>
                </div>
            </li>
        </div>
      </nav>
        
    {{--<nav class="navbar border-bottom d-flex" style="background-color: #083d25">
        
        <div class="container-fluid">
            
                <a class="navbar-brand px-4">
                    <img src="{{URL::asset('/images/logoponkene.jpg')}}" width="100px" height="60px" class="img-responsive rounded-2" alt="Ponkene Logo" >
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav item">
                            <a href="http://127.0.0.1:8000/empleados/index" class="nav-link  border rounded-top align-items-start " style="color: white;font-size: 1rem">Lista Empleados</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link border rounded-top align-items-start" style="color: white;font-size: 1rem">Lista Reserva</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-item nav-link border rounded-top align-items-start" style="color: white;font-size: 1rem">Ver Caja</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-item nav-link border rounded-top align-items-start" style="color: white;font-size: 1rem">Mesas</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-item nav-link border rounded-top  align-items-start" style="color: white;font-size: 1rem">Informes</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8000/insumos" class="nav-item nav-link border rounded-top align-items-start" style="color: white;font-size: 1rem">Insumos</a>
                        </li>
                        <li class="nav-item">
                            <div class="flex-shrink">
                                <span class="px-4 align-center" style="color: white;font-size: 1.5rem">{{Auth::user()->nombre}} {{Auth::user()->apellido}}</span>
                            <a href="{{route('empleado.logout')}}" class="btn btn-danger mx-2">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
                
                
                
            
        </div>--}}
        
        
        
        {{--<ul class="dropdown-toggle"><a href="" class="nav-item nav-link border rounded-top align-items-start dropdown-toggle" style="color: white;font-size: 1rem"></a>
            Carta
            <a href="" class="dropdown-item">Insumos</a>
        </ul>
        <a class="nav-item nav-link border rounded-top align-items-start dropdown-toggle " role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;font-size: 1rem">
            Carta
            <ul class="dropdown-menu " data-bs-toggle="dropdown"   aria-labelledby="dropdownMenuLink">
                <li><a href=""  class="dropdown-item"></a>Insumos </li>
                <li><a href=""  class="dropdown-item"></a>Platos</li>
                
            </ul>

        </a>
      
             
                <a class="dropdown-toggle nav-item dropdown" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>--}}
             
                
        
        
    </nav>
    <div class="container-fluid">
        @yield('main')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    

    
    @endauth

</body>
</html>



    


    





    
    
