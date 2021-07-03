<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\LoginEmpleadoRequest;
use App\Http\Requests\EditEmpleadoRequest;
use Illuminate\Validation\ValidationException;


class EmpleadoController extends Controller
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
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get(key:'search'));
            $empleados = Empleado::where('nombre','LIKE',"%$query%")
                ->orWhere('apellido','LIKE', "%$query%")
                ->get();
            return view('empleado.index',compact('empleados'));
        }
        /*else{
            $empleados = Empleado::all();
            return view ('empleado.index',compact('empleados') );
        }*/
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleadoRequest $request)
    {
        $empleado = new Empleado();
        $empleado->rut = $request->rut;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->password = Hash::make($request->password);
        $empleado->fono = $request->fono;
        $empleado->direccion = $request->direccion;
        $empleado->email = $request->email;
        $empleado->tipo_empleado = $request->tipo_empleado;
        $empleado->save();
        return redirect(route('empleado.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EditEmpleadoRequest $request, Empleado $empleado)
    {
        $empleado->rut = $request->rut;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->password = Hash::make($request->password);
        $empleado->fono = $request->fono;
        $empleado->direccion = $request->direccion;
        $empleado->email = $request->email;
        $empleado->tipo_empleado = $request->tipo_empleado;

        $empleado->save();

        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleado.index');
        

    }

    public function login(LoginEmpleadoRequest $request){
        $credenciales = $request->only('rut','password');
        if(Auth::attempt($credenciales)){
            //credenciales correctas
            //dd('credenciales ok');
            return redirect()->route('empleado.index');
        }else{
            //credenciales incorrectas
            
            throw ValidationException::withMessages(['password' =>'Estas credenciales no coinciden con nuestros registros']);
            
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('empleado.login-form');
    }


    
}