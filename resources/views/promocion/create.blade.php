@extends('layout.admin')

@section('main')
    <div class="row d-flex justify-content-center mt-2">
        <div class="card w-50">
            <div class="card-title mt-2">
                Crear Promocion
            </div>
            <div class="card-body">
                
                {{--Errores--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <p>Se han producido los siguientes errores:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="font-size: x-small">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{--FORMULARIO--}}
                <form method="POST" action="{{route('promocion.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                    </div>
                    <div class="form-group justify-content mt-3">
                        <label for="">Fecha de Inicio</label>
                        <hr>
                        <div class="row">
                            <div class="form-group col">
                                <label class="col-4" for="hora">Hora</label>
                                <input type="time" name="hora_ini" id="hora_ini" class="form-control" value="{{old('hora_ini')}}">
                            </div>
                            <div class="form-group col">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" value="{{old('fecha_ini')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group justify-content mt-3">
                        <label for="">Fecha de Termino</label>
                        <hr>
                        <div class="row">
                            <div class="form-group col">
                                <label class="col-4" for="hora_ter">Hora</label>
                                <input type="time" name="hora_ter" id="hora_ter" class="form-control" value="{{old('hora_ter')}}">
                            </div>
                            <div class="form-group col">
                                <label for="fecha_ter">Fecha</label>
                                <input type="date" name="fecha_ter" id="fecha_ter" class="form-control" value="{{old('fecha_ter')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="precio">Precio</label>
                        <input type="number" min="0" name="precio" id="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio')}}">
                    </div>
                    <div class="form-group mt-2" id="formGroupPlato">
                        <label for="plato" >Platos</label>
                        <hr>
                        <div class="container" >
                            @foreach ($platos as $plato)
                                <div class="row align-content-center">
                                    <div class="col-2">
                                        <input type="number" min="0" class="form-control" name="cantidad[]" placeholder="0">
                                    </div>
                                    <div class="col">
                                        <label for="" value="{{$plato->cod_plato}}" >{{$plato->nombre}}</label>
                                    </div>
                                    <hr>
                                </div>


                                {{--<li class="input-item bordered mx-2" >
                                    <input type="checkbox" name="plato[]" id="platos" class="form-check-input mx-2 " value="{{$plato->cod_plato}}" >
                                    {{$plato->nombre}}
                                </li>--}}
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <a href="{{ route('plato.index') }}" class="btn btn-warning">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>


                    
                </form>
            </div>
        </div>
    </div>
    
@endsection