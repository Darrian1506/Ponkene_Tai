<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Promocion;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StorePromocionRequest;

class PromocionController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['login']);
        $this->middleware('auth.admin',['only'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $promociones = Promocion::orderBy('created_at')->get();
        

        return view('promocion.index',compact('promociones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platos = Plato::orderBy('nombre')->get();
        return view('promocion.create',compact('platos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromocionRequest $request)
    {
        $promocion = new Promocion();
        $platos = Plato::orderBy('created_at')->get();
        $promocion->nombre = $request->nombre;
        $promocion->precio = $request->precio;
        $flag = false;
        for ($i=0; $i <count($request->cantidad) ; $i++) { 
            if(isset(($request->cantidad)[$i]) or (($request->cantidad)[$i])!=0){
                $flag = true;
            }
        }
        
        if (($request->fecha_ter)>($request->fecha_ini)){
            $promocion->inicio_promo = $request->fecha_ini.' '.$request->hora_ini;
            $promocion->termi_promo = $request->fecha_ter.' '.$request->hora_ter;
        }
        elseif (($request->fecha_ter)==($request->fecha_ter)){
            if (($request->hora_ter)>($request->hora_ini)){
                $promocion->inicio_promo = $request->fecha_ini.' '.$request->hora_ini;
                $promocion->termi_promo = $request->fecha_ter.' '.$request->hora_ter;    
            }
            else{
                return redirect()->back();
            }
        }
        else {
            return redirect()->back();
        }
        $promocion->save();
        for ($i=0; $i <count($request->cantidad) ; $i++) { 
            if(isset(($request->cantidad)[$i]) and (($request->cantidad)[$i])!=0){
                $promocion->plato()->attach([
                    (($platos[$i])->cod_plato) => ['cantidad' => (($request->cantidad)[$i])]
                ]);
            }
        }
        return redirect()->route('promocion.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function show(Promocion $promocion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promocion $promocion)
    {
        $platos = Plato::orderBy('nombre')->get();
        return view('promocion.edit',compact('promocion','platos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocion $promocion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocion $promocion)
    {
        //
    }
}
