@extends('layouts.inicio')
@section('contenido')

<h2>Hola Mundo :) </h2>
<ul>
	<li>{{$datos[0]}}</li>
	<li>{{$datos[1]}}</li>
	<li>{{$nombres}}</li>
</ul>
@endsection