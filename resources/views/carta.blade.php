@extends('layout.master')

@section('main')
<div class="row d-flex justify-content-center mt-2">
    <div class="card w-50">
        <div class="card-title mt-2">
            
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
            <form method="POST" action="{{route('registroHora.store')}}">
                @csrf
                <div class="form-group">
                    <label for="rut">Rut</label>
                    <input type="text" name="rut" id="rut" class="form-control @error('rut') is-invalid @enderror" value="{{old('rut')}}">
                </div>
                <span id="clock"></span>
                <div class="form-group mt-4">
                    <a href="{{ route('plato.index') }}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection