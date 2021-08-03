<?php

namespace App\Http\Controllers;

use App\Models\Cocina;
use App\Models\Plato;
use App\Models\Promocion;
use App\Models\Insumo;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CocinaController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['login', 'loginApi']);
        $this->middleware('auth.cocina',['only'=>['index']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $date = Carbon::now()->toDateString();
        $query = trim($request->get(key:'search'));
        if ($query != "") {
            $comandas = Cocina::where('estado','LIKE',$query)
                    ->where('fecha','LIKE',"%$date%")
                    ->orderBy('created_at','asc')->get();
            $platos = Plato::orderBy('precio')->get();
            $insumos = Insumo::orderBy('precio')->get();
            $promociones = Promocion::orderBy('precio')->get();
            return view('cocina.index',compact('comandas','platos','promociones','insumos'));    
        }
        else {
            $platos = Plato::orderBy('precio')->get();
            $insumos = Insumo::orderBy('precio')->get();
            $comandas = Cocina::where('fecha','LIKE',"%$date%")
                                ->orderBy('created_at','asc')->get();
            $promociones = Promocion::orderBy('precio')->get();
            return view('cocina.index',compact('comandas','platos','promociones','insumos'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cocina  $cocina
     * @return \Illuminate\Http\Response
     */
    public function show(Cocina $cocina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cocina  $cocina
     * @return \Illuminate\Http\Response
     */
    public function edit(Cocina $cocina)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cocina  $cocina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cocina $cocina)
    {

        $comanda = Cocina::find($cocina->cod_comanda);
        $comanda->estado = $request->estado;
        $comanda->save();
        return redirect()->route('cocina.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cocina  $cocina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cocina $cocina)
    {
        //
    }
}
