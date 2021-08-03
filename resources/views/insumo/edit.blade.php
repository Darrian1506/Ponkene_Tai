@extends('layout.admin')

@section('main')
<div class="row d-flex justify-content-center mt-2">
    <div class="card w-50">
        <div class="card-title mt-2">Editar Insumo</div>
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
                    <form method="POST" action="{{ route('insumo.update',$insumo->cod_insu) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="cod_insu">Código insumo</label>
                            <input type="number" name="cod_insu" id="cod_insu" value="{{old('nombre',$insumo->cod_insu)}}"  class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre"  class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$insumo->nombre)}}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="categoria">Categoría</label>
                            <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror" value={{old('categoria')}} >
                                <option value="A" @if (old('categoria',$insumo->categoria)=='A') selected @endif >Aderezo</option>
                                <option value="B" @if (old('categoria',$insumo->categoria)=='B') selected @endif >Bebida</option>
                                <option value="C" @if (old('categoria',$insumo->categoria)=='C') selected @endif>Carne</option>
                                <option value="E" @if (old('categoria',$insumo->categoria)=='E') selected @endif>Ensalada</option>
                                <option value="G" @if (old('categoria',$insumo->categoria)=='G') selected @endif>Guarnición</option>                                
                                <option value="M" @if (old('categoria',$insumo->categoria)=='M') selected @endif>Marisco</option>
                                <option value="F" @if (old('categoria',$insumo->categoria)=='F') selected @endif>Pescado</option>
                                <option value="P" @if (old('categoria',$insumo->categoria)=='P') selected @endif>Pollo</option>
                                <option value="S" @if (old('categoria',$insumo->categoria)=='S') selected @endif>Postre</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="precio">Precio</label>
                            <input type="number" min="0" id="precio" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio',$insumo->precio)}}">
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('insumo.index') }}" class="btn btn-warning">Cancelar</a>
                            <button type="submit" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection