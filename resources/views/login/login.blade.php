@extends('layouts.plantilla')

@section('title', 'USIN')

@section('content')
@include('layouts.nav')

<main>



    <div class="container" id="login_div">
    <div class="container">
    <img  class="img img-responsive " src="{{asset('fundelec2.png')}}" id="login_imagen">
        <p>
            Ingrese sus credenciales
        </p>
        <hr>
    <form action="login_valida" method="post">
        @csrf
        <p >Unidad de Seguridad Integral | USIN</p>

        <div class="_6lux" id="login_input">
            <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}" placeholder="Usuario" required autofocus> @error('name') {{ $message }} @enderror
        </div>

        <div class="_6lux" id="login_input">
            <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña" required> @error('password') {{ $message }} @enderror
        </div>

        <div class="form-group">
            <label>
            <input type="checkbox" id="remember" name="remember" id="login_check">
                Recuerdame
            </label>
        </div>
        <hr>
        <button class="btn btn-danger" type="submit" id="login_boton" >Acceder</button>


    </form>
    </div>
        </div>
    </main>

@endsection
