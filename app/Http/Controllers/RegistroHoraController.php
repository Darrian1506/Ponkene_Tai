<?php

namespace App\Http\Controllers;

use App\Models\RegistroHora;
use Illuminate\Http\Request;

class RegistroHoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registroHoras = RegistroHora::get();
        return view('registroHora.index',compact('registroHoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registroHora.create');
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
     * @param  \App\Models\RegistroHora  $registroHora
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroHora $registroHora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroHora  $registroHora
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroHora $registroHora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroHora  $registroHora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroHora $registroHora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroHora  $registroHora
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroHora $registroHora)
    {
        //
    }
}
