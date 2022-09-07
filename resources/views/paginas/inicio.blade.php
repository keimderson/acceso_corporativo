@extends('layouts.plantilla')

@section('title', 'USIN')

@section('content')

@include('layouts.nav')

<form action="consulta_visitantes" method="post">
    @csrf
 	<h1 id="cabecera_texto"> Consulta de Visitante
    <br>
    </h1>
        <div class="row" id="row">
        
            <div class="form-group" id="input">
                <label for="cedula_v">Cédula</label>
                <input type="number" class="form-control" name="cedula_v" id="cedula_v" value="{{old('cedula_v')}}" required autofocus> @error('cedula_v') {{$message}} @enderror
               <div id="interno_boton">
                <button type="submit" class="btn" id="boton_enviar">Consultar</button>
                </div>  
            </div> 
        
    </div>
</form>
@endsection

