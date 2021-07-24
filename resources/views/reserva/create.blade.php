@extends('layout.master')

@section('main')
    <div class="row d-flex justify-content-center mt-2">
        <div class="card w-50">
            <div class="card-title mt-2">
                <div class="card-body">
                    {{--Errores--}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <p>Se han producido los siguientes errores:</p>
                            <ul>
                                @foreach ($errors as $error)
                                    <li style="font-size: x-small">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{--FORMULARIO--}}
                    <form method="POST" action="{{route('reserva.store')}}">
                        @csrf
                        <div class="form-group mt-2">
                            <b for="fecha">Fecha</b>
                            <input type="date" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror"  value="{{old('fecha')}}">
                        </div>
                        <div class="form-group mt-2">
                            <b for="hora">Hora</b>
                            <input type="time" name="hora" id="hora" class="form-control @error('hora') is-invalid @enderror"  value="{{old('hora')}}">
                        </div>
                        <div class="form-group mt-2">
                            <b for="rutCliente">Rut Cliente</b>
                            <input type="text" name="rutCliente" id="rutCliente" class="form-control @error('rutCliente') is-invalid @enderror"  value="{{old('rutCliente')}}">
                        </div>
                        <div class="form-group mt-2">
                            <b for="nombre">Nombre</b>
                            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror"  value="{{old('nombre')}}">
                        </div>
                        <div class="form-group mt-2">
                            <b for="apellido">Apellido</b>
                            <input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{old('apellido')}}">
                        </div>
                        <div class="form-group mt-2">
                            <b for="fono">Numero de celular</b>
                            <input type="number" name="fono" id="fono" class="form-control @error('fono') is-invalid @enderror" value="{{old('fono')}}">
                        </div>
                        <div class="form-group mt-2">
                            <b for="cant_personas">Cantidad de Personas</b>
                            <input type="number" name="cant_personas" id="cant_personas" class="form-control @error('cant_personas') is-invalid @enderror" value="{{old('cant_personas')}}">
                        </div>
                        <div class="form-group mt-2">
                            <b for="descripcion">Detalles adicionales</b>
                            <input type="text" name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}">
                        </div>
                        <div class="form-group mt-2" id="formGroupInsumo">
                            <div class="form-group mt-4">
                                <a href="{{ route('inicio') }}" class="btn btn-warning">Cancelar</a>
                                <button type="submit" class="btn btn-primary" >Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    
    
@endsection