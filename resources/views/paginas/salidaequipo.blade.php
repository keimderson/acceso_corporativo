@extends('layouts.plantilla')

@section('title', 'USIN-Equipos')

@section('content')
    @include('layouts.nav')
                        <form action="consultaequipo" method="post">
                            @csrf


                        <button>salida</button>
                    </form>
            
@endsection