@extends('layout.admin')

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

    <script type="text/javascript">
        var clockElement = document.getElementById('clock');
    
        function clock() {
            var date = new Date();

            // Replace '400px' below with where you want the format to change.
            if (window.matchMedia('(max-width: 800px)').matches) {
                // Use this format for windows with a width up to the value above.
                clockElement.textContent = date.toDateString();
            } else {
                // While this format will be used for larger windows.
                clockElement.textContent = date.toString();
            }
        }
    
        setInterval(clock, 1000);
    </script>
    
@endsection