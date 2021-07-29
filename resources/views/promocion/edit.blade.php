@extends('layout.admin')

@section('main')
    <div class="row d-flex justify-content-center mt-2">
        <div class="card w-50">
            <div class="card-title mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{--Errors Display--}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <p>Se han producido los siguentes errores:</p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="font-size: x-small">{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{route('promocion.update',$promocion->cod_promo)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="cod_promo">Código Promo</label>
                                    <input type="number" name="cod_promo" class="form-control" id="cod_promo" disabled value="{{$promocion->cod_promo}}">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$promocion->nombre)}}">
                                </div>
                                <div class="form-group justify-content mt-3">
                                    <label for="">Fecha de Inicio</label>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="col-4" for="hora">Hora</label>
                                            <input type="time" name="hora_ini" id="hora_ini" class="form-control" value="{{old('hora_ini', date('H:i', strtotime($promocion->inicio_promo)))}}">
                                        </div>
                                        <div class="form-group col">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" value="{{old('fecha_ini',date('Y-m-d', strtotime($promocion->inicio_promo)))}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group justify-content mt-3">
                                    <label for="">Fecha de Termino</label>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="col-4" for="hora">Hora</label>
                                            <input type="time" name="hora_ter" id="hora_ter" class="form-control" value="{{old('hora_ter', date('H:i', strtotime($promocion->termi_promo)))}}">
                                        </div>
                                        <div class="form-group col">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" name="fecha_ter" id="fecha_ter" class="form-control @error('precio') is-invalid @enderror" value="{{old('fecha_ter',date('Y-m-d', strtotime($promocion->termi_promo)))}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="precio">Precio</label>
                                    <input type="number" min="0" name="precio" id="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio',$promocion->precio)}}">
                                </div>
                                <div class="form-group mt-2" id="formGroupPlato">
                                    <label for="plato" >Platos</label>
                                    <hr>
                                    <div class="container" >
                                        @foreach ($platos as $plato)
                                            <div class="row align-content-center">
                                                <div class="col-2">
                                                    
                                                    <input type="number" min="0" class="form-control" name="cantidad[]" 
                                                        placeholder="0"

                                                        @foreach ($promocion->plato as $plato_promo)
                                                            @if ($plato->cod_plato == $plato_promo->cod_plato )
                                                                value="{{$plato_promo->pivot->cantidad}}"
                                                            
                                                            @endif
                                                        @endforeach
                                                    >
                                                </div>
                                                <div class="col">
                                                    <label for="" value="{{$plato->cod_plato}}" >{{$plato->nombre}}</label>
                                                </div>
                                                
                                                
                                                <hr>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <a href="{{ route('promocion.index') }}" class="btn btn-warning">Cancelar</a>
                                    <button type="submit" class="btn btn-primary" >Editar</button>
                                </div>
                            </form>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection