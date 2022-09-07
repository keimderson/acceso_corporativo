@extends('layouts.plantilla')

@section('title', 'USIN-Visitantes')

@section('content')
    @include('layouts.nav')
    <h1 id="cabecera_texto">Registro de visitantes</h1>
                        <form action="visitantes_registro" method="post">
                            @csrf
                            <h1 id="cabecera_texto"> Formulario para el Registro de Visitantes
                                <br>
                            </h1>
                            
                            <div class="card" id="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6 border" style="font-size: 1.2rem">
                                            <div class="form-group">
                                                <label for="cedula">Cédula del Visitante {{session()->get('visitante')}}</label>
                                            </div> 

                                            <div class="form-group">
                                                <label for="nombre">Nombre y apellido</label>
                                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" autofocus required> @error('nombre') {{$message}} @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="razon_v">Razón de la Visita</label>
                                                <input type="text" class="form-control" name="razon_v" id="razon_v" value="{{old('razon_v')}}" required> @error('razon_v') {{$message}} @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="anunciar">Gerencia</label>
                                                <input type="text" class="form-control" name="anunciar" id="anunciar" value="{{old('anunciar')}}" required> @error('anunciar') {{$message}} @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="sitio_r">Sitio de Registro</label>
                                                <select class="form-control" name="sitio_r" id="sitio_r" required>
                                                    <option value="PISO 8">PISO 8</option>
                                                    <option value="PISO 7">PISO 7</option>
                                                    <option value="PISO 9">PISO 9</option>
                                                </select> @error('sitio_r') {{$message}} @enderror
                                            </div>
                                        </div> <!-- fin columna izquierda de datos de trabajador -->

                                        <div class="col-12 col-md-6 border">
                                            <div class="row">

                                                <div class="col-12 col-md-6" style="font-size: 1.2rem">
                                                    <div class="form-group">
                                                        <label for="observacion">Observación</label>
                                                        <input type="text" class="form-control" name="observacion" id="observacion" value="{{old('observacion')}}" required> @error('observacion') {{$message}} @enderror
                                                    </div>

                                                </div>

                                                </div>

                                            </div>
                      <div class="btn-group">
                                <div>
                                <button class="btn btn-success btn-sm mt-3" type="submit">Registrar</button>
                                <a class="btn btn-primary btn-sm mt-3" href="inicio">Volver</a>
                                </div>
                            </div>
                                        </div> <!-- fin columna derecha del formulario covid -->

                                    </div>
                                </div>
                            </div>


                    </div>


                    </form>

@endsection
            
