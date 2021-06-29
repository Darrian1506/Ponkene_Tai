

@extends('layout.admin')

@section('main')

    <div class="container-fluid mt-2">
        <div class="row d-flex justify-content-around ">
            <div class="col float-left">
                <h3>Lista de Empleados</h3>
            </div>
            
            <div class="col float-rigth d-flex">
                <!--Buscador-->
                <div class="col-9 d-flex">
                    <form action="" class="form-inline ml-4 col-11">
                        <div class="input-group input-group-sm">
                            <input name="search" type="search" class="form-control form-control-navbar" placeholder="Buscar" >
                            <div class="input-group-append">
                                <button class="btn btn-navbar btn-info ml-4" type="submit">
                                    <i class="bi bi-search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="col-3 ml-2 d-flex">
                    <a href="{{route('empleado.create')}}" class="btn btn-primary " style="font-size:14px " >Agregar Empleado</a> 
                </div>
            </div>
        </div>
    </div>
    



    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive rounded">
                <table class="table table-bordered table-striped table-hover">
                    <thead class=" bg-dark text-white text-center">
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fono</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Tipo de Empleado</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado)
                        <tr>
                            <td>{{$empleado->rut}}</td>
                            <td>{{$empleado->nombre}}</td>
                            <td>{{$empleado->apellido}}</td>
                            <td>{{$empleado->fono}}</td>
                            <td>{{$empleado->direccion}}</td>
                            <td>{{$empleado->email}}</td>
                            <td>@if ($empleado->tipo_empleado == 'A')
                                    Administrador
                                @elseif ($empleado->tipo_empleado == 'B')
                                    Barman
                                @elseif ($empleado->tipo_empleado == 'C')
                                    Cocinero
                                @else
                                    Mesero
                                @endif
                            </td>
                            <td> 
                                <div class="d-flex">
                                    <a href="{{route('empleado.edit',$empleado->rut)}}" class="btn btn-success pr-2" style="font-size: small" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        Editar
                                    </a>
                                    <button type="button" style="font-size: small" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrarEmpleadoModal{{$empleado->rut}}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>    
                                        Borrar
                                    </button>
                                </div> 
                            </td>
                        </tr>

                        <!--Modal-->
                        <div class="modal fade" id="borrarEmpleadoModal{{$empleado->rut}}" tabindex="-1" aria-labelledby="borrarEmpleadoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="borrarEmpleadoModalLabel">Confirmar borrado</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea borrar al empleado <strong>{{$empleado->nombre}} {{$empleado->apellido}}</strong> seleccionado?
                                    
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{route('empleado.destroy',$empleado->rut)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Borrar</button> 
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection

