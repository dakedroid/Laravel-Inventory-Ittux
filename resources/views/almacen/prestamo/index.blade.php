@extends('layouts.admin')
@section('contenido')

  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  		<h3>Listado de articulos prestados </h3>
      <table WIDTH="100%" class="table table-condensed">
        <th WIDTH="50%">@include('almacen.prestamo.search')</th>
        <th WIDTH="50%"></th>
      </table>
</div>

  <div ALIGN="center" class="row">
  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  		<div class="table-responsive">
  			<table class="table table-striped table-bordered table-condensed table-hover">
  				<thead>
  					<th>Num. Progreso</th>
  					<th>Nombre herramienta</th>
  					<th>Categoria</th>
            <th>Cantidad</th>
            <th>Unidad</th>
            <th>Portador</th>
  					<th>Opciones</th>
  				</thead>
                 @foreach ($prestamo as $cat)
  				<tr>
  					<td>{{ $cat->num_progre}}</td>
  					<td>{{ $cat->nombre}}</td>
  					<td>{{ $cat->categoria}}</td>
            <td>{{ $cat->cantidad}}</td>
            <td>{{ $cat->unidad}}</td>
            <td>{{ $cat->portador}}</td>
  					<td>

             <a href="" data-target="#modal-delete-{{$cat->clave}}" data-toggle="modal"><button class="btn btn-danger">Cancelar</button></a>

            </td>
  				</tr>
  				@include('almacen.prestamo.modal')
  				@endforeach
  			</table>
  		</div>
  		{{$prestamo->render()}}
  	</div>


    </div>
    </div>

@endsection
