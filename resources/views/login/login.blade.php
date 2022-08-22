@extends('layouts.plantilla')

@section('title', 'USIN')

@section('content')
    <form action="../app/Models/login.php<?php  ?>" method="post">
        @csrf
        <p class="p" style="font-weight:bold; text-shadow: 1px 1px 3px black; color: white; font-size:2.2rem">FUNDELEC</p>
        <p class="p"style="font-weight:bold; text-shadow: 1px 1px 3px black; color: white; margin-top: -22px">Unidad de Seguridad Integral | USIN</p>
        <hr>
        <p style="color:white"> A continuación ingrese su nombre de usuario y su clave corporativa, presione acceder para ingresar al sistema</p>
        <hr>

        <div class="form-group">
            <label class="label lead" for="usuario" style="font-weight:bold; text-shadow: 1px 1px 3px black; color: white">Operador</label>
            <input class="form-control" type="text" id="usuario" name="usuario" required>
        </div>

        <div class="form-group">
            <label class="label lead" for="clave" style="font-weight:bold; text-shadow: 1px 1px 3px black; color: white">Clave</label>
            <input class="form-control" type="password" id="clave" name="clave" required>
        </div>
        <hr>
        <button class="btn btn-danger" type="submit" style="box-shadow: 1px 1px 3px black; font-size: 1.3rem">Acceder</button>


    </form>
@endsection
