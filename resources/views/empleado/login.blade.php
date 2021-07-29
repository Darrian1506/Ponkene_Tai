@extends('layout.master')
<link rel="stylesheet" href="">

@section('main')
    <div class="row ">
        <div class="col offset-4 mt-2 ">
            <div class="card  border rounded" style="width: 40% ">
                <div class="card-header text-center ">Inicio de Sesión</div>
                <div class="card-body"></div>
                {{--Mensajes de Error--}}
                @if ($errors->any())
                <div class="alert alert-danger ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="font-size:x-small">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                    
                @endif
                <form  method="POST" action="{{ route('empleado.login') }}">
                    @csrf
                    <div class="form-group mt-2 px-2">
                        <label for="rut">Rut</label>
                        <input type="text" id="rut" name="rut" required oninput="formatoVerificaRut(this)"  class="form-control @error('rut') is-invalid @enderror" value="{{old('rut')}}">

                    </div>
                    <div class="form-group mt-2 px-2">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" >
                    </div>
                    <div class="form-group mt-3 px-2">
                        <button type="submit" class="btn btn-primary" >Iniciar Sesión</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function formatoVerificaRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.','');
            // Despejar Guión
            valor = valor.replace('-','');
        
            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0,-1);
            dv = valor.slice(-1).toUpperCase();
        
            // Formatear RUN
            rut.value = cuerpo + '-'+ dv
    
            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
            
            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;
            
            // Para cada dígito del Cuerpo
            for(i=1;i<=cuerpo.length;i++) {
                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);

                // Sumar al Contador General
                suma = suma + index;
        
                // Consolidar Múltiplo dentro del rango [2,7]
                if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
            }
    
            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);
    
            // Casos Especiales (0 y K)
            dv = (dv == 'K')?10:dv;
            dv = (dv == 0)?11:dv;
    
            // Validar que el Cuerpo coincide con su Dígito Verificador
            if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
            // Si todo sale bien, eliminar errores (decretar que es válido)
            rut.setCustomValidity('');
        }
    </script>
@endsection