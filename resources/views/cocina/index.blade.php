@extends('layout.admin')

@section('main')
    <div class="d-flex mt-2 justify-content-start">
        <form action="">
            <input type="search"  name="search" hidden value="">
            <button  type="submit" class="btn btn-secondary" >Todas</button>
        </form>
        <form action="">
            <input type="search" name="search" hidden value="C">
            <button class="btn btn-secondary mx-4">Creadas</button>
        </form>
        <form action="">
            <input type="search" name="search" hidden value="P">
            <button class="btn btn-secondary mx-4">En Preparación</button>
        </form>
        <form action="">
            <input type="search" name="search" hidden value="L">
            <button class="btn btn-secondary mx-4">Listas</button>
        </form>
        
        
        
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col">
            @foreach ($comandas as $comanda)
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-dark text-white text-center">
                        <th>Mesa:  {{$comanda->mesa}}</th>
                        <th>Fecha-Hora: {{$comanda->fecha}}</th>
                        <th>Mesero:  {{$comanda->rut}}</th>
                        <th>Estado:  
                            @switch($comanda->estado)
                                @case('C')
                                    Creada
                                    @break
                                @case('P')
                                    En Preparación
                                    @break
                                @case('L')
                                    Listo
                                    @break 
                            @endswitch
                        </th>
                        <th></th>
                    </thead>
                    <tbody>

                        <tr class="d-flex">
                            @foreach ($comanda->plato() as $plato_comanda)
                                <div class="col">
                                    <div class="card">

                                    </div>        
                                </div>
                            
                            @endforeach
                        </tr>
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
            @endforeach
        </div>
    </div>
@endsection