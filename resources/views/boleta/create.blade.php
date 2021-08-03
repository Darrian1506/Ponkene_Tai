@extends('layout.admin')

@section('main')
    <div class="row d-flex justify-content-center mt-2">
        <div class="card-50">
            <div class="card-title mt-2">
                Crear Boleta
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

                <form method="POST" action="{{route('boleta.store')}}">
                    @csrf
                    <div class="form-group">
                        
                    </div>
                
                
                
                </form>
            </div>
        </div>
    </div>

    
@endsection