

@extends('layout.admin')

@section('main')
    
    <div class="container-fluid mt-2">
        <div class="row d-flex justify-content-around ">
            <div class="col float-left">
                <h3>Lista de Reservas</h3>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive rounded">
                <table class="table table-bordered table-striped table-hover">
                    <thead class=" bg-dark text-white text-center">
                        <th>N°</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Nombre Cliente</th>
                        <th>Rut Cliente</th>
                        <th>Numero de Contacto</th>
                        <th>Cantidad de plazas</th>
                        <th>Descripcion Adicional</th>
                        <th>Verificado por</th>
                    </thead>
                    <tbody>
                        @foreach($reservas as $reserva)
                        <tr>
                            <td>{{$reserva->cod_reserva}}</td>
                            <td>@if ($reserva->estado == 'E')
                                    En verificacion
                                @elseif ($reserva->estado == 'A')
                                    Aprobada
                                @else
                                    Rechazada
                                @endif
                            </td>
                            <td>{{date('d-m-Y', strtotime($reserva->fecha))}}</td>
                            <td>{{date('H:m', strtotime($reserva->hora))}}</td>
                            <td>{{$reserva->nombre}} {{$reserva->apellido}}</td>
                            <td>{{$reserva->rutCliente}}</td>
                            <td>{{$reserva->fono}}</td>
                            <td>{{$reserva->cant_personas}}</td>
                            <td>{{$reserva->descripcion}}</td>
                            <td> @if ($reserva->estado == 'E')
                                <div class="d-flex">
                                    <button type="button" style="font-size: small" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AprobarModal{{$reserva->cod_reserva}}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>   
                                        Aprobar
                                    </button>
                                    <button type="button" style="font-size: small" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#RechazarModal{{$reserva->cod_reserva}}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>    
                                        Rechazar
                                    </button>
                                </div> 
                                @else{{$reserva->empleado->nombre}} {{$reserva->empleado->apellido}}
                                @endif
                            </td>
                        </tr>

                        <!--Modal APROBAR-->
                        <div class="modal fade" id="AprobarModal{{$reserva->cod_reserva}}" tabindex="-1" aria-labelledby="AprobarModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="AprobarModalLabel">Aprobar Reserva</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea Aprobar la reserva N° <strong>{{$reserva->cod_reserva}}</strong> de <strong> {{$reserva->nombre}} {{$reserva->apellido}}</strong> ?
                                    
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{route('reserva.update', array($reserva->cod_reserva, 'A'))}}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success">Aprobar</button> 
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!--Modal Rechazar-->
                        <div class="modal fade" id="RechazarModal{{$reserva->cod_reserva}}" tabindex="-1" aria-labelledby="RechazarModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="RechazarModalLabel">Rechazar Reserva</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea Rechazar la reserva N° <strong>{{$reserva->cod_reserva}}</strong> de <strong> {{$reserva->nombre}} {{$reserva->apellido}}</strong> ?
                                    <br>
                                    <br>
                                    <strong>No olvide de llamar al cliente e informar del rechazo de su reserva</strong>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{route('reserva.update', array($reserva->cod_reserva, 'R'))}}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Rechazar</button> 
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

