@extends('layout.master')
<link rel="stylesheet" href="">

@section('main')
    <div class="row ">
        <div class="col offset-4 mt-2 ">
            <div class="card  border rounded" style="width: 40% ">
                <div class="card-header text-center ">Inicio de Sesión</div>
                <div class="card-body"></div>
                {{--Mensajes de Error--}}
                @if ($errors->any())
                <div class="alert alert-danger ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="font-size:x-small">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                    
                @endif
                <form  method="POST" action="{{ route('empleado.login') }}">
                    @csrf
                    <div class="form-group mt-2 px-2">
                        <label for="rut">Rut</label>
                        <input type="text" id="rut" name="rut" onblur="{{--{{customRut('rut')}}--}}"  class="form-control @error('rut') is-invalid @enderror" value="{{old('rut')}}">

                    </div>
                    <div class="form-group mt-2 px-2">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" >
                    </div>
                    <div class="form-group mt-3 px-2">
                        <button type="submit" class="btn btn-primary" >Iniciar Sesión</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection