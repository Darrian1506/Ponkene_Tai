<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PlatoController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['login','indexApi']);
        $this->middleware('auth.admin',['only'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::orderBy('nombre')->get();
        return view('plato.index',compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::orderBy('categoria')->get();
        return view('plato.create',compact('insumos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plato = new Plato();
        $plato->nombre = $request->nombre;
        $plato->precio = $request->precio;
        $plato->save();


        for ($i=0; $i < count($request->insumo); $i++) { 
            $plato->insumo()->attach(($request->insumo)[$i]);
        }
        return redirect(route('plato.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show(Plato $plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        $insumos = Insumo::all();
        return view('plato.edit',compact('plato','insumos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        $plato->nombre = $request->nombre;
        $plato->precio = $request->precio;
        $plato->save();
        for ($i=0; $i < count($plato->insumo) ; $i++) { 
            $plato->insumo()->detach(($plato->insumo)[$i]);
        }
        for ($i=0; $i < count($request->insumo); $i++) { 
            $plato->insumo()->attach(($request->insumo)[$i]);
        }
        return redirect()->route('plato.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        $plato->delete();
        return redirect()->route('plato.index');
    }

    public function indexApi()
    {
        return Plato::orderBy('nombre')->get();
    }
}
