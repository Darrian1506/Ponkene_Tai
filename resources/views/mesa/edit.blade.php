@extends('layout.admin')

@section('main')
    <div class="row d-flex justify-content-center mt-4">
        <div class="card w-25">
            <h5 class="card-title mt-2">Editar Mesa</h5>
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
                {{--Formulario--}}
                
                <form method="POST" action="{{ route('mesa.update',$mesa->cod_mesa) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group ">
                        <label for="cod_mesa">Número de Mesa</label>
                        <input type="number" id="cod_mesa" name="cod_mesa" disabled class="form-control @error('cod_mesa') is-invalid @enderror" value="{{old('cod_mesa',$mesa->cod_mesa)}}">
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="ubicacion">Categoría</label>
                        <select name="ubicacion" id="ubicacion" class="form-select form-control @error('ubicacion') is-invalid @enderror" value="{{old('ubicacion')}}">
                            <option value="P" @if (old('ubicacion',$mesa->ubicacion) == 'P') selected @endif>Playa</option>
                            <option value="T" @if (old('ubicacion',$mesa->ubicacion) == 'T') selected @endif  >Terraza</option>
                            <option value="S" @if (old('ubicacion',$mesa->ubicacion) == 'S') selected @endif >Salón</option>
                        </select>  
                    </div>

                    <div class="form-group mt-2">
                        <label for="capacidad">Capacidad</label>
                        <input type="number" id="capacidad" name="capacidad" class="form-control @error('capacidad') is-invalid @enderror" value="{{old('capacidad',$mesa->capacidad)}}">
                    </div>
                    
                    <div class="form-group mt-2">
                        <a href="{{ route('mesa.index') }}" class="btn btn-warning">Cancelar</a>
                        <button type="submit" class="btn btn-primary" >Agregar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection