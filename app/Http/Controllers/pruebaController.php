<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Foto;

class pruebaController extends Controller
{
    public function personalizado ()
    {
    	$fo=Foto::All();
    	//return  view('prueba123.practica0001');  
    	return $fo;
    } 

     public function parametro($nombre , $edad)
    {
    	$fo=Foto::All();
    	$dato=[];
    	/// primera manera
    	$dato[0]=$nombre;   
    	$dato[1]=$edad;
    	///segunda manera
    	return  view('prueba123.practica0001',['datos' => $dato , 'nombres' => $nombre , 'edads'=>$edad]);  
    	//return $fo;
    	
    } 
    public function bienvenida ()
    {

      return view ('bienvenida');  
    }

}   

