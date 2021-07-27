@extends('layout.admin')

@section('main')
    <div class="row d-flex justify-content-center mt-2">
        <div class="card w-50">
            <div class="card-title mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{--Errors Display--}}
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

                            <form method="POST" action="{{route('promocion.update',$promocion->cod_promo)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="cod_promo">Código Promo</label>
                                    <input type="number" name="cod_promo" class="form-control" id="cod_promo" disabled value="{{$promocion->cod_promo}}">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$promocion->cod_promo)}}">
                                </div>
                                <div class="form-group">
                                    <label for="pre"></label>
                                </div>
                            </form>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection