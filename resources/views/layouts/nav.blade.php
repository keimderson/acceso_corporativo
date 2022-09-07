
@auth
@extends('layouts.plantilla')

<div class="barra" id="barra">
	<h3>menu</h3>
	<ul>
		<div><a class="btn" href="inicio">Vsitantes</a></div>
		<div><a class="btn" href="equipo">Equipo</a></div>
		<div><a class="btn" href="dashboard">Equipos en sede</a></div>
		<div><a class="btn" href="visitantesconsulta">visitantes registrados</a></div>
		<div>			<form style="display: inline" action="logout" method="post">
			    @csrf
			    <a class="btn" href="#" onclick="this.closest('form').submit()">Logout</a>
			</form></div>
	</ul>
</div>


<div class="contenido" id="contenido">
	<span class="icon-menu abiri"></span>
</div>


<!--<aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block" >
    <div class="flex flex-col h-full">
		
		  <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
		  	<div x-data="{ isActive: false, open: true}"  >
			<a class="btn" href="inicio">Vsitantes</a>
			<a class="btn" href="equipo">Equipo</a>
			<a class="btn" href="dashboard">Equipos en sede</a>
			<a class="btn" href="visitantesconsulta">visitantes registrados</a>
			<form style="display: inline" action="logout" method="post">
			    @csrf
			    <a class="btn" href="#" onclick="this.closest('form').submit()">Logout</a>
			</form>
	</div>
		</div>

		</nav>
</div>
</aside>-->


<!--	<div class="btn-group">
		<div>
		<a class="btn btn-primary" href="inicio">Vsitantes</a>
		</div>
		<div>
		<a class="btn btn-primary" href="equipo">Equipo</a>
		</div>
		<div>
		<a class="btn btn-primary" href="dashboard">Equipos en sede</a>
		</div>
		<div>
		<a class="btn btn-primary" href="visitantesconsulta">visitantes registrados</a>
		</div>
		<form style="display: inline" action="logout" method="post">
		    @csrf
		    <a class="btn btn-primary" href="#" onclick="this.closest('form').submit()">Logout</a>
		</form>
		
		<h3 style="display: inline;">Operador: {{session()->get('operador')}}</h3>
	</div>-->

@else
 

@endauth

@if(session('status'))

    <br>
    {{session('status')}}

@endif


