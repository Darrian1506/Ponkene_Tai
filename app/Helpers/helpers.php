<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

function customRut(Request $request)
    {
        
        if (strlen($valor)!=0){
            $valor = str_replace(',','',$request);
            $valor = str_replace('-','',$valor);
            $dv= strtoupper(substr($valor,-1));
            $cuerpo = substr($valor,0,-1);
            $cuerpo1 = substr($cuerpo,-3,3);
            $cuerpo2 = substr($cuerpo,-6,3);
            $cuerpo3 = substr($cuerpo,0,-6);
            
            $rut = implode('.',[$cuerpo1,$cuerpo2,$cuerpo3]);
            $rut = implode('-',[$rut,$dv]);
            Input::this->replace([$request,$rut]);
            
        }
        

    }