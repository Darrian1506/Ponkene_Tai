@extends('layout.admin')


@section('main')
    <div class="d-flex mt-2 justify-content-between">
        <h3 class="order-1">Registro de Horas</h3>
        <div class="order-2">
            <span id="clock" class="mx-1"></span>
            <a href="" class="btn btn-primary mx-1">Registrar Entrada</a>
            <a href="" class="btn btn-warning mx-1">Registrar Salida</a>
        </div>
    </div>
    <div class="d-flex justify-content-start border-top">
        <form action="" class="col-2 mt-1">
            <button class="btn btn-secondary mx-4">Mes</button>
        </form>
        <form action="" class="col-2 mt-1">
            <button class="btn btn-secondary mx-4">Semana</button>
        </form>
        <form action="" class="col-2 mt-1">
            <button class="btn btn-secondary mx-4">Hoy</button>
        </form>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-dark text-white text-center">
                        <th>Rut</th>
                        <th>Fecha</th>
                        <th>Hora Entrada</th>
                        <th>Hora Salida</th>
                    </thead>
                    <tbody>
                        @foreach ($registroHoras as $registroHora)
                            <tr>
                                <td>{{$registroHora->rut}}</td>
                                <td>{{$registroHora->fecha}}</td>
                                <td>{{$registroHora->hora}}</td>
                                <td>{{$registroHora->hora_salida}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                clockElement.textContent = date.toLocaleString();
            } else {
                // While this format will be used for larger windows.
                clockElement.textContent = date.toLocaleString();
            }
        }
    
        setInterval(clock, 1000);
    </script>
@endsection