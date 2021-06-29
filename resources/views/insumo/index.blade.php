@extends('layout.admin')

@section('main')
    <h3>Insumos</h3>
    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-dark text-white">
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

    <div class="row mt-2">
        <di class="col">
            <a href="{{ route('insumo.create') }}" class="btn btn-success">Agregar insumo</a>
        </di>
    </div>


@endsection