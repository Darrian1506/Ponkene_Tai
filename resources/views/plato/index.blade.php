@extends('layout.admin')

@section('main')
    <div class="d-flex mt-2 justify-content-between">
        <h3 class="order-1">Platos</h3>
        <a href="{{route('plato.create')}}" class="btn btn-success order-2">Agregar plato</a>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-dark text-white text-center">
                        <th>Código Plato</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Insumos</th>
                    </thead>
                    <tbody>
                        @foreach ($platos as $plato)
                            <tr>
                                <td>{{$plato->cod_plato}}</td>
                                <td>{{$plato->nombre}}</td>
                                <td>{{$plato->precio}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection