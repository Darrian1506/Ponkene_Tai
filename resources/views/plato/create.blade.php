@extends('layout.admin')

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
                    <form method="POST" action="{{route('plato.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror"  value="{{old('nombre')}}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="precio">Precio</label>
                            <input type="number" name="precio" id="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio')}}">
                        </div>
                        <div class="form-group mt-2" id="formGroupInsumo">
                            <label for="insumo" >Insumos <a id="addRow" class="btn btn-success btn-sm " style="text-decoration-color: white">+</a>
                            </label>
                            <hr>
                            <div class="input-group" style="list-style: none" >
                                @foreach ($insumos as $insumo)
                                    <li class="input-item bordered" >
                                        <input type="checkbox" name="insumo[]" class="form-check-input mx-2" value="{{$insumo->cod_insu}}" >
                                        {{$insumo->nombre}}
                                    </li>
                                @endforeach
                                {{--<select class="select-form" >
                                    @foreach ($insumos as $insumo)
                                        <option id="option" value="{{$insumo->cod_insu}}">{{$insumo->nombre}}</option>
                                    @endforeach
                                </select>
                                <table class="table table-bordered table-hover table-striped ">
                                    <tbody class="">
                                        <tbody></tbody>
                                    </tbody>
                                </table>--}}
                            </div>
                            <div class="form-group mt-4">
                                <a href="{{ route('plato.index') }}" class="btn btn-warning">Cancelar</a>
                                <button type="submit" class="btn btn-primary" >Agregar</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    
    
@endsection