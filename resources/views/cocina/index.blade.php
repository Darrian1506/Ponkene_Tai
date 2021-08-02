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
            @foreach ($comandas as $comanda)
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-dark text-white text-center">
                        <th>Mesa:  {{$comanda->mesa}}</th>
                        <th>Cod Comanda:  {{$comanda->cod_comanda}}</th>
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
                    <tbody >
                            <tr>
                                @foreach ($comanda->plato as $plato_comanda)
                                
                                    <div class="card m-2" style="height:150px; width: 150px">
                                        <div class="card-title">
                                            @foreach ($platos as $plato)
                                                @if ($plato->cod_plato == $plato_comanda->cod_plato )
                                                <div class="card-body">
                                                    <div class="col">
                                                        Cant:{{$plato_comanda->pivot->cantidad}}  
                                                        {{$plato->nombre}} 
                                                        Cod Comanda:{{$comanda->cod_comanda}}
                                                        {{$comanda->mesa}}
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>        
                                
                                @endforeach
                                @foreach ($comanda->promocion as $promocion_comanda)
                                    <div class="card m-2" style="height:150px; width: 150px">
                                        <div class="card-title">
                                            @foreach ($promociones as $promocion)
                                                @if ($promocion->cod_promocion == $promocion_comanda->cod_promocion)
                                                <div class="card-body">
                                                    <div class="col">
                                                        {{$promocion_comanda->pivot->cantidad}}  {{$promocion->nombre}}
                                                    </div>
                                                    
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>        
                                @endforeach 
                            
                            </tr>
                        
                    </tbody>
                </table>
                
            </div>
            @endforeach
    
@endsection