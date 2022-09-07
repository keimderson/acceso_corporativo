@extends('layouts.plantilla')

@section('title', 'USIN-Equipos')

@section('content')

@include('layouts.nav')

    <h1 id="cabecera_texto">visitantes registrados</h1>

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
            </tr> 
          </thead>


          <tbody>
            @foreach($resultado as $visitantes)
            <tr>
              <td>{{$visitantes->cedula}}</td>          
              <td>{{$visitantes->fecha_reg}}</td>
              <td>{{$visitantes->nombres}}</td>
              <td>{{$visitantes->observacion}}</td>
              <td>{{$visitantes->razon_v}}</td>
              <td>{{$visitantes->estatus}}</td>
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