@extends('layouts.plantilla')

@section('title', 'USIN-Dashboard')

@section('content')
    @include('layouts.nav')
    <h1>Registro de equipos</h1>
                        <form action="registrarequipo" method="post">
                            @csrf
                            <h1 style="font-size:1.6rem"> Formulario para el Registro de equipos
                                <br>
                            </h1>

                            <div class="card" >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6 border" style="font-size: 1.2rem">
                                            <div class="form-group">
                                                <label for="cedula">Cédula del Visitante: {{session()->get('cedula_e')}}</label>
                                            </div> 
                                                                                        <div class="form-group">
                                                <label for="nombres">Nombre y apellido: {{session()->get('nom')}}</label>
                                            </div> 


                                            <div class="form-group">
                                                <label for="tipo">Descripcion</label>
                                                <input type="text" class="form-control" name="tipo" id="tipo" value="{{old('tipo')}}" autofocus required> @error('tipo') {{$message}} @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="marca">Marca</label>
                                                <input type="text" class="form-control" name="marca" id="marca" value="{{old('marca')}}" required> @error('marca') {{$message}} @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="modelo">Modelo</label>
                                                <input type="text" class="form-control" name="modelo" id="modelo" value="{{old('modelo')}}" required> @error('modelo') {{$message}} @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="razon">Razón</label>
                                                <input type="text" class="form-control" name="razon" id="razon" value="{{old('razon')}}" required> @error('razon') {{$message}} @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="sitio_r">Sitio de Registro</label>
                                                <select class="form-control" name="sitio_r" id="sitio_r"> required
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

                                        </div> <!-- fin columna derecha del formulario covid -->

                                    </div>
                                </div>
                            </div>
                            <h1 class="p mt-3"></h1>

                            <div class="btn-group">
                                <div>
                                <button class="btn btn-success btn-sm mt-9" type="submit">Registrar</button>
                                <a class="btn btn-primary btn-sm mt-9" href="inicio">Volver</a>
                                </div>
                            </div>

                    </div>
                    </form>


@endsection