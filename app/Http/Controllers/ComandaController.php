<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use Illuminate\Http\Request;

class ComandaController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['storeApi']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
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
     * @param  \App\Models\Comanda  $cocina
     * @return \Illuminate\Http\Response
     */
    public function show(Comanda $cocina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comanda  $cocina
     * @return \Illuminate\Http\Response
     */
    public function edit(Comanda $cocina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comanda  $cocina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comanda $cocina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comanda  $cocina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comanda $cocina)
    {
        //
    }
    public function storeApi(Request $request){
        $comanda = new Comanda();
        $comanda->fecha = $request->fecha;
        $comanda->estado = 'C';
        $comanda->mesa = (int)$request->mesa;
        $comanda->rut = $request->rut;
        $comanda->save();

        if($request->insumos != ''){
            $lista = explode('A', $request->insumos);
            for ($i=0; $i < count($lista) ; $i++) {
                if($lista[$i] != ''){
                    $insuCant = explode('R', $lista[$i]);
                    $comanda->insumos()->attach([($insuCant[0]) => ['cantidad' => ($insuCant[1])]]);
                }
            }
        }
        
        if($request->promociones != ''){
            $lista = explode('A', $request->promociones);
            for ($i=0; $i < count($lista) ; $i++) {
                if($lista[$i] != ''){
                    $promoCant = explode('R', $lista[$i]);
                    $comanda->promociones()->attach([($promoCant[0]) => ['cantidad' => ($promoCant[1])]]);
                }
            }
        }

        if($request->platos != ''){
            $lista = explode('A', $request->platos);
            for ($i=0; $i < count($lista) ; $i++) {
                if($lista[$i] != ''){
                    $platoCant = explode('R', $lista[$i]);
                    $comanda->platos()->attach([($platoCant[0]) => ['cantidad' => ($platoCant[1])]]);
                }
            }
        }
        if($request->comentarios != ''){
            $lista = explode('-', $request->comentarios);
            $hola = explode('::',$lista[0]);
            for ($i=0; $i < count($lista) ; $i++) {
                if($lista[$i] != ''){
                    $platoComen= explode('::', $lista[$i]);
                    $comanda->platos()->sync([($platoComen[0]) => ['descripcion' => ($platoComen[1])]]);
                }
            }
        }
    }
}
