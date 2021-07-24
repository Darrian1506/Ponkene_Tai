<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservaRequest;

class ReservaController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['create', 'store', 'indexApi']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view('reserva.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserva.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservaRequest $request)
    {
        $reserva = new Reserva();
        $reserva->fecha = $request->fecha;
        $reserva->hora = $request->hora;
        $reserva->rutCliente = $request->rutCliente;
        $reserva->nombre = $request->nombre;
        $reserva->apellido = $request->apellido;
        $reserva->fono = $request->fono;
        $reserva->cant_personas = $request->cant_personas;
        $reserva->descripcion = $request->descripcion;
        $reserva->estado = 'E';
        $reserva->save();
        return redirect(route('inicio'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva, String $estado)
    {
        $datos = Reserva::find($reserva);
        $reserva->fecha = $datos[0]->fecha;
        $reserva->hora = $datos[0]->hora;
        $reserva->rutCliente = $datos[0]->rutCliente;
        $reserva->nombre = $datos[0]->nombre;
        $reserva->apellido = $datos[0]->apellido;
        $reserva->fono = $datos[0]->fono;
        $reserva->cant_personas = $datos[0]->cant_personas;
        $reserva->descripcion = $datos[0]->descripcion;
        $reserva->estado = $estado;
        $reserva->save();
        return redirect(route('reserva.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        //
    }

    public function indexApi(){
        return Reserva::all();
    }
}
