@extends('layout.admin')

@section('main')
    <div class="row d-flex justify-content-center mt-2">
        <div class="card w-50">
            <div class="card-title mt-2">
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
                            <form method="POST" action="{{route('plato.update',$plato->cod_plato)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="cod_plato">Código plato</label>
                                    <input type="number" name="cod_plato" id="cod_plato" value="{{$plato->cod_plato}}" class="form-control" disabled>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$plato->nombre)}}">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="precio">Precio</label>
                                    <input type="number" name="precio" id="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio',$plato->precio)}}">
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label for="insumo">Insumos</label>
                                    <hr>
                                    <div class="input-group " style="list-style:none">
                                        @foreach ($insumos as $insumo)
                                            <li class="input-item bordered" >
                                                <input type="checkbox" name="insumo[]" class="form-check-input mx-2" value="{{$insumo->cod_insu}}"
                                                @for ($i = 0; $i < count($plato->insumo); $i++)
                                                    @if ($insumo->cod_insu == (($plato->insumo)[$i])->cod_insu)
                                                        checked
                                                    @endif
                                                @endfor
                                                >
                                                {{$insumo->nombre}}
                                            </li>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <a href="{{ route('plato.index') }}" class="btn btn-warning">Cancelar</a>
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