@extends('layout.master')

@section('main')
    <h3>Agregar insumo</h3>

    <div class="row">
        <div class="col">
            <form method="POST" action="{{ route('insumo.store') }}">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="categoria">Categoría</label>
                    <select name="" id="categoria" name="categoria">
                        <option value="g">Guarnición</option>
                    </select>  
                </div>
                <div class="form-group mt-2">
                    <label for="precio">Precio</label>
                    <input type="number" min="0" id="precio" name="precio" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <a href="{{ route('insumo.index') }}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary" >Agregar</button>
                </div>
            </form>
        </div>
    </div>
@endsection