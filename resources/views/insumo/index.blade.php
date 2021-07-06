@extends('layout.admin')

@section('main')

    
    <div class="d-flex mt-2 justify-content-between">
        <h3 class="order-1">Insumos</h3>
        <a href="{{ route('insumo.create') }}" class="btn btn-success order-2">Agregar insumo</a>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-dark text-white text-center">
                        <th>Código Insumo</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($insumos as $insumo)
                        <tr class="">
                            <td>{{$insumo->cod_insu}}</td>
                            <td>{{$insumo->nombre}}</td>
                            <td>@switch($insumo->categoria)
                                @case('G')
                                    Guarnición
                                    @break
                                @case('B')
                                    Bebida
                                    @break
                                @case('E')
                                    Ensalada
                                    @break
                                @case('E')
                                    Ensalada
                                    @break
                                @case('C')
                                    Carne
                                    @break
                                @case('F')
                                    Pescado
                                    @break
                                @case('M')
                                    Marisco
                                    @break
                                @case('P')
                                    Pollo
                                    @break
                                @case('S')
                                    Postre
                                    @break
                                @default
                                    
                                @endswitch

                            <td>{{$insumo->precio}}</td>
                            <td> 
                                <div class="d-flex">
                                    <a href="{{route('insumo.edit',$insumo->cod_insu)}}" class="btn btn-success pr-2" style="font-size: small" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        Editar
                                    </a>
                                    <button type="button" style="font-size: small" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrarInsumoModal{{$insumo->cod_insu}}" >
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
                        <div class="modal fade" id="borrarInsumoModal{{$insumo->cod_insu}}" tabindex="-1" aria-labelledby="borrarInsumoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="borrarInsumoModalLabel">Confirmar borrado</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea borrar el insumo <strong>{{$insumo->cod_insu}}  {{$insumo->nombre}} </strong> seleccionado?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{route('insumo.destroy',$insumo->cod_insu)}}">
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