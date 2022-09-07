@extends('layouts.plantilla')

@section('title', 'USIN-Equipos')

@section('content')

@include('layouts.nav')

<form action="consultaequipo" method="post">
    @csrf
    <h1 id="cabecera_texto"> Consulta equipos del Visitante
    <br>
    </h1>
        <div class="row" id="row">
                <div class="form-group" id="input">

                <label for="cedula_v">Cédula</label>

                <input type="number" class="form-control" name="cedula" id="cedula" value="{{old('cedula')}}" required autofocus> @error('cedula') {{$message}} @enderror

                <div id="interno_boton">
                    <button type="submit" class="btn" id="boton_enviar">Consultar</button>
                </div>     
        </div> 
    </div>
</form>

            
@endsection