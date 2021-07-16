@extends('layout.admin') 

@section('main')
<div class="row d-flex justify-content-center mt-2">
    <div class="card w-50">
        <h5 class="card-title mt-2">Editar Empleado</h5>
        <div class="card-body">
            <div class="row">
                <div class="col">
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
                    <form method="POST" action="{{ route('empleado.update',$empleado->rut) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control  @error('nombre') is-invalid @enderror"  value="{{old('nombre',$empleado->nombre)}}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control  @error('apellido') is-invalid @enderror" value="{{old('apellido',$empleado->apellido)}}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="fono">Fono</label>
                            <input type="text" name="fono" id="fono" class="form-control  @error('fono') is-invalid @enderror" value="{{old('fono',$empleado->fono)}}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control  @error('direccion') is-invalid @enderror" value="{{old('direccion',$empleado->direccion)}}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">email</label>
                            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email',$empleado->email)}}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="tipo_empleado">Tipo de Empleado</label>
                            <select name="tipo_empleado" id="tipo_empleado" class="form-control @error('tipo_empleado') is-invalid @enderror"  value={{old('tipo_empleado')}}>
                                <option value="A" @if(old('tipo_empleado',$empleado->tipo_empleado)=='A') selected @endif>Administrador</option>
                                <option value="C" @if(old('tipo_empleado',$empleado->tipo_empleado)=='C') selected @endif>Cocinero</option>
                                <option value="B" @if(old('tipo_empleado',$empleado->tipo_empleado)=='B') selected @endif>Barman</option>
                                <option value="M" @if(old('tipo_empleado',$empleado->tipo_empleado)=='M') selected @endif>Mesero</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="confirmPassword">Confirmar Contraseña</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('empleado.index') }}" class="btn btn-warning">Cancelar</a>
                            <button type="submit" class="btn btn-primary" >Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection