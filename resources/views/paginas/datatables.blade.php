<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script type="text/javascript" src="{{ asset('resources/js/apps.js') }}" ></script>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="icon"   href="favicon.ico" type="image/ico">
    <title>datatables</title>
</head>
<body>
<div class="card">
    <div class="card-body">
                       
        <table class="table table-striped"  style="width: 100%;" id="tabla" >
          <thead>
            <tr>
            <th>fecha de registro</th>
            <th>cedula</th>
            <th>Nombres</th>
            <th>observacion</th>
            <th>razon</th>
            <th>salida</th>
            </tr> 
          </thead>
@foreach($resultado as $visitantes)
  <tbody>
    <tr>
      <td>{{$visitantes->fecha_reg}}</td>
      <td>{{$visitantes->cedula}}</td>
      <td>{{$visitantes->observacion}}</td>
      <td>{{$visitantes->razon_v}}</td>
    </tr>
@endforeach
          </tbody>
          </table>
        </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script >
        $(document).ready(function() {
            $('#tabla').DataTable();
        });
    </script>
</body>
</html>


