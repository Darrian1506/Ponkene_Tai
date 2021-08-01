@extends('layout.admin')

@section('main')
    
    <div class="row d-flex justify-content-center mt-2">
        <div class="card w-50">
            <h5 class="card-title mt-2">Agregar Insumos</h5>
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
                
                <form method="POST" action="{{ route('insumo.store') }}">
                    @csrf
                    <div class="form-group ">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="categoria">Categoría</label>
                        <select name="categoria" id="categoria" name="categoria" class="form-select form-control @error('categoria') is-invalid @enderror" value="{{old('categoria')}}">
                            <option value="A">Aderezo</option>
                            <option value="B">Bebida</option>
                            <option value="C">Carne</option>
                            <option value="E">Ensalada</option>
                            <option value="G">Guarnición</option>                            
                            <option value="M">Marisco</option>
                            <option value="F">Pescado</option>
                            <option value="P">Pollo</option>
                            <option value="S">Postre</option>                            
                        </select>  
                    </div>
                    <div class="form-group mt-2 col-4">
                        <label for="precio">Precio</label>
                        <input type="number"  min="0" id="precio" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio')}}">
                    </div>
                    <div class="form-group mt-2">
                        <a href="{{ route('insumo.index') }}" class="btn btn-warning">Cancelar</a>
                        <button type="submit" class="btn btn-primary" >Agregar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    

    {{--<div class="row" >
        <div class="col ms-3">
            <form method="POST" action="{{ route('insumo.store') }}">
                <div class="form-group col-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
                <div class="form-group mt-2 col-4">
                    <label for="categoria">Categoría</label>
                    <select name="" id="categoria" name="categoria">
                        <option value="g">Guarnición</option>
                    </select>  
                </div>
                <div class="form-group mt-2 col-4">
                    <label for="precio">Precio</label>
                    <input type="number" min="0" id="precio" name="precio" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <a href="{{ route('insumo.index') }}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary" >Agregar</button>
                </div>
            </form>
        </div>
    </div>--}}
@endsection