@extends('layouts.plantilla')

@section('title', 'USIN-Salida visitantes')

@section('content')
    @include('layouts.nav')
    <h1 id="cabecera_texto">Salida de visitantes</h1>
                        <form action="visitantes_salida" method="post">
                            @csrf
                           
                            <div class="card" id="card_salida" >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6 border" style="font-size: 1.2rem">
                                            <div class="form-group">
                                                <label for="cedula">Cédula del Visitante {{session()->get('visitante')}}</label>
                                            </div> 

                                            <div class="form-group">
                                                <label for="sitio_r">Sitio de Registro</label>
                                                <select class="form-control" name="sitio_r" id="sitio_r">
                                                    <option value="PISO 8">PISO 8</option>
                                                    <option value="PISO 7">PISO 7</option>
                                                    <option value="PISO 9">PISO 9</option>
                                                </select> @error('sitio_r') {{$message}} @enderror
                                            </div>
                                        </div> <!-- fin columna izquierda de datos de trabajador -->

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
                                <button class="btn btn-success btn-sm mt-3" type="submit">Registrar</button>
                                <a class="btn btn-primary btn-sm mt-3" href="inicio">Volver</a>
                                </div>
                            </div>

                    </div>


                    </form>
<div class="card" id="card">
    <div class="card-body">
                       
        <table class="table table-striped"  style="width: 100%;" id="tabla" >
          <thead>
            <tr>
            <th>Cédula</th>
            <th>Fecha de registro</th>
            <th>Nombres</th>
            <th>observacion</th>
            <th>razon</th>
            <th>salida</th>
            </tr> 
          </thead>


          <tbody>
            @foreach($consultae as $visitantes)
            <tr>
              <td>{{$visitantes->cedula}}</td>          
              <td>{{$visitantes->fecha_ingreso}}</td>
              <td>{{$visitantes->nombres}}</td>
              <td>{{$visitantes->observacion}}</td>
              <td>{{$visitantes->razon}}</td>
              <td><form method="get" ><a href="salidaequipo?id={{$visitantes->equipos_id}}&cedula={{$visitantes->cedula}}" type="button" class="btn btn-warning btn-sm">salida</a></form></td>
            </tr>
        @endforeach
          </tbody>
          </table>
    </div>
</div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>

    <script >

            $('#tabla').DataTable({
                responsive: true,
                autowidth: false
            });
    </script>
@endsection


