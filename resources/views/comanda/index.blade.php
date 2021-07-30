@extends('layout.cocina')

@section('main')
    <div class="d-flex mt-2 justify-content-start">
        <button class="btn btn-secondary mx-4">Creadas</button>
        <button class="btn btn-secondary mx-4">En Preparación</button>
        <button class="btn btn-secondary mx-4">Listas</button>
        <hr>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-dark text-white text-center">
                        <th>Código </th>
                        <th>Mesa</th>
                        <th>Fecha</th>
                        <th>Rut</th>
                        <th>Boleta</th>
                        <th>Platos-Promos-Insumos</th>
                        <th>Estado</th>
                        <th></th>
                    </thead>
                    <tbody>
                        {{--@foreach ($collection as $item)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>    
                        @endforeach--}}
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection