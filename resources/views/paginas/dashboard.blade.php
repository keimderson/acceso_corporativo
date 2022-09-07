@extends('layouts.plantilla')

@section('title', 'USIN-Equipos')

@section('content')

@include('layouts.nav')

<h1 id="cabecera_texto">equipos en sede</h1>

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
            <th>Estatus</th>
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
              <td>{{$visitantes->estatus}}</td>
               <td><form method="get" ><a href="salidaequipodash?id={{$visitantes->equipos_id}}&cedula={{$visitantes->cedula}}" type="button" class="btn btn-warning btn-sm">salida</a></form></td>
            </tr>
        @endforeach
          </tbody>
          </table>
              </div>
</div>

@endsection

@section('js')

 
 

    <script >

            $('#tabla').DataTable({
                responsive: true,
                autowidth: false
            });
    </script>
@endsection

