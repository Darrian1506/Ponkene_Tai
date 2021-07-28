@extends('layout.admin')

@section('main')
    <div class="row d-flex justify-content-center mt-2">
        <div class="card w-50">
            <h5 class="card-title mt-2">Agregar Empleado</h5>
            <div class="card-body">
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

            <form method="POST" action="{{route('empleado.store')}}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                </div>
                <div class="form-group mt-2">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{old('apellido')}}">
                </div>
                <div class="form-group mt-2">
                    <label for="rut">Rut</label>
                    <input type="text" name="rut" id="rut" required oninput="formatoVerificaRut(this)" class="form-control @error('rut') is-invalid @enderror" value="{{old('rut')}}">
                </div>
                <div class="form-group mt-2">
                    <label for="fono">Fono</label>
                    <input type="text" name="fono" id="fono" class="form-control @error('fono') is-invalid @enderror" value="{{old('fono')}}">
                </div>
                <div class="form-group mt-2">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{old('direccion')}}">
                </div>
                <div class="form-group mt-2">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                </div>
                <div class="form-group mt-2">
                    <label for="tipo_empleado">Tipo de Empleado</label>
                    <select name="tipo_empleado" id="tipo_empleado" class="form-select form-control @error('tipo_empleado') is-invalid @enderror" value="{{old('tipo_empleado')}}">
                        <option value="A">Administrador</option>
                        <option value="C">Cocinero</option>
                        <option value="B">Barman</option>
                        <option value="M">Mesero</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="confirmPassword">Confirmar Contraseña</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <a href="{{route('empleado.index')}}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary" >Agregar</button>
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