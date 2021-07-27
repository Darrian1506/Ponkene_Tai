@extends('layout.admin')

@section('main')
    <div class="d-flex mt-2 justify-content-between">
        <h3 class="order-1">Promociones</h3>
        <a href="{{route('promocion.create')}}" class="btn btn-success order-2">Agregar Promocion</a>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-dark text-white text-center">
                        <th>Código Promo</th>
                        <th>Nombre</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Termino</th>
                        <th>Precio</th>
                        <th>Platos o Insumos</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($promociones as $promocion)
                            <tr>
                                <td>{{$promocion->cod_promo}}</td>
                                <td>{{$promocion->nombre}}</td>
                                <td>{{$promocion->inicio_promo}}</td>
                                <td>{{$promocion->termi_promo}}</td>
                                <td>{{$promocion->precio}}</td>
                                <td></td>
                                <td>
                                    <div class="d-flex flex-row-reverse">
                                        <div>
                                            <a href="{{route('promocion.edit',$promocion->cod_promo)}}" class="btn btn-success pr-2" style="font-size: small" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                                Editar
                                            </a>
                                            <button type="button" style="font-size: small" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrarPromocionModal{{$promocion->cod_promo}}" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>    
                                                Borrar
                                            </button>
                                        </div>
                                        
                                    </div> 
                                </td>
                            </tr>
                            <!--Modal-->
                            <div class="modal fade" id="borrarPromocionModal{{$promocion->cod_promo}}" tabindex="-1" aria-labelledby="borrarPromocionModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="borrarPromoModalLabel">Confirmar borrado</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea borrar el plato <strong>{{$promocion->cod_promo}}  {{$promocion->nombre}} </strong> seleccionado?
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{route('promocion.destroy',$promocion->cod_promo)}}">
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