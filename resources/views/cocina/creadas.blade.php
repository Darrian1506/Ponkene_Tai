@extends('layout.admin')

@section('main')
    <div class="d-flex mt-2 justify-content-start">
        <form action="" class="col-2">
            <input type="search"  name="search" hidden value="">
            <button  type="submit" class="btn btn-secondary" >Todas</button>
        </form>
        <form action="" class="col-2">
            <input type="search" name="search" hidden value="C">
            <button class="btn btn-secondary mx-4">Creadas</button>
        </form>
        <form action="" class="col-2">
            <input type="search" name="search" hidden value="P">
            <button class="btn btn-secondary mx-4">En Preparación</button>
        </form>
        <form action="" class="col-2">
            <input type="search" name="search" hidden value="L">
            <button class="btn btn-secondary mx-4">Listas</button>
        </form>
        <div class="col-2"></div>
        <span class="col-1 justify-content-end" id="clock"></span>
    </div>
    <hr>
    <h4>Creadas</h4>
    @foreach ($comandas as $comanda)
    <div class="card border-dark mb-3 text-center">
        <div class="card-header">
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
                        
                    </thead>
                </table> 
                </div>
            </div>
            <div class="card-body d-flex">
                <div class="col-10">
                    <div class="row">
                        @foreach ($comanda->plato as $plato_comanda)                        
                            @foreach ($platos as $plato)
                                @if ($plato->cod_plato == $plato_comanda->cod_plato )
                                    <div class="card text-white bg-primary mb-2" style="min-height:150px; min-width: 150px;max-height:200px;max-width:200px">
                                        <div class="card-header">Cantidad : {{$plato_comanda->pivot->cantidad}}</div>
                                        <div class="card-body">
                                            <div class="col">
                                                {{$plato->nombre}}
                                                
                                                
                                                {{--Cod Comanda:{{$comanda->cod_comanda}}
                                                {{$comanda->mesa}}--}}
                                            </div>
                                        </div>
                                        <div class="card-footer" style="">
                                            <small>
                                                {{$plato_comanda->pivot->descripcion}}
                                            </small>
                                            
                                        </div>                                         
                                    </div> 
                                @endif
                            @endforeach                                                
                        @endforeach
    
                        @foreach ($comanda->promocion as $promocion_comanda)                      
                            @foreach ($promociones as $promocion)
                                @if ($promocion->cod_promocion == $promocion_comanda->cod_promocion)
                                    <div class="card text-white bg-secondary mb-2 " style="height:150px; width: 150px">
                                        <div class="card-header">Cantidad : {{$promocion_comanda->pivot->cantidad}}</div>
                                        <div class="card-body">
                                            <div class="col">
                                                {{$promocion->nombre}}
    
                                                {{--Cod Comanda:{{$comanda->cod_comanda}}
                                                {{$comanda->mesa}}--}}
                                            </div>
                                        </div>                                        
                                    </div> 
                                @endif
                            @endforeach                                                
                        @endforeach
    
                        @foreach ($comanda->insumo as $insumo_comanda)                      
                            @foreach ($insumos as $insumo)
                                @if ($insumo->cod_insu == $insumo_comanda->cod_insu)
                                    <div class="card text-white bg-success mb-2" style="height:150px; width: 150px">
                                        <div class="card-header">Cantidad : {{$insumo_comanda->pivot->cantidad}}</div>
                                        <div class="card-body">
                                            <div class="col">
                                                {{$insumo->nombre}}
                                                
                                                {{--Cod Comanda:{{$comanda->cod_comanda}}
                                                {{$comanda->mesa}}--}}
                                            </div>
                                        </div>
                                                                               
                                    </div> 
                                @endif
                            @endforeach                                                
                        @endforeach
                    </div>
                </div>
                
                <div class="col-2  align-content-center" style="border-left: thin gray solid" >
                    <div class="row align-content-center ms-5 mb-3">
                        <form method="POST" action="{{route('cocina.update',$comanda->cod_comanda)}}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="estado" id="estado" value="C" hidden>
                            <button type="submit" class="btn btn-info " style="width: 130px;min-height:100px">Creada</button>
                        </form>
                        
                    </div>
                    <div class="row align-content-center ms-5 mb-3">
                        <form method="POST" action="{{route('cocina.update',$comanda->cod_comanda)}}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="estado" id="estado" value="P" hidden>
                            <button type="submit" class="btn btn-danger" style="width: 130px;min-height:100px">En Preparación</button>
                        </form>
                        
                    </div>
                    <div class="row align-content-center ms-5 mb-3">
                        <form method="POST" action="{{route('cocina.update',$comanda->cod_comanda)}}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="estado" id="estado" value="L" hidden>
                            <button class="btn btn-success" style="width: 130px;min-height:100px">Listo</button>    
                        </form>
                        
                    </div>
                    
                    
                </div>
            </div>       
        </div>                       
    @endforeach        
    
    {{--
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
        <hr>
        @endforeach  --}}
        <script type="text/javascript">
            var clockElement = document.getElementById('clock');
            
        
            function clock() {
                clockElement.textContent = new Date().toLocaleString();
                
            }
        
            setInterval(clock, 1000);
        </script>

@endsection