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
                    </thead>
                    <tbody>
                        @foreach($insumos as $insumo)
                        <tr>
                            <td>{{$insumo->cod_insu}}</td>
                            <td>{{$insumo->nombre}}</td>
                            <td>{{$insumo->categoria}}</td>
                            <td>{{$insumo->precio}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    


@endsection