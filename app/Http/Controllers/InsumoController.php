<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreInsumoRequest;
use Illuminate\Validation\ValidationException;

class InsumoController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['indexApi']);
        $this->middleware('auth.admin',['only'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::orderBy('categoria')->get();
        return view('insumo.index', compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insumo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInsumoRequest $request)
    {
        $newInsumo = new Insumo();
        $newInsumo->nombre = $request->nombre;
        $newInsumo->categoria = $request->categoria;
        $newInsumo->precio = $request->precio;
        $newInsumo->save();
        return redirect(route('insumo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        return view('insumo.edit',compact('insumo'));
        $this->middleware('auth.admin',['only'=>['index']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        
        $insumo->nombre = $request->nombre;
        $insumo->categoria = $request->categoria;
        $insumo->precio = $request->precio;

        $insumo->save();

        return redirect()->route('insumo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        $insumo->delete();
        return redirect()->route('insumo.index');
    }

    public function indexApi(String $categoria){
        return Insumo::where('categoria', $categoria)->orderBy('nombre')->get();
    }
}
