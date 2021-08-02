<?php

namespace App\Http\Controllers;

use App\Models\Cocina;
use Illuminate\Http\Request;

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

        $query = trim($request->get(key:'search'));
        if ($query != "") {
            $comandas = Cocina::where('estado','LIKE',$query)
                    ->orderBy('created_at','desc')->get();
            return view('cocina.index',compact('comandas'));    
        }
        else {
            $comandas = Cocina::orderBy('created_at','desc')->get();
            return view('cocina.index',compact('comandas'));
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
        //
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
        //
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
