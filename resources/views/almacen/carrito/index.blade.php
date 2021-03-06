@extends('layouts.admin')
@section('contenido')
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  		<h3>Listado de articulos añadidos al carrito </h3>
      <table WIDTH="100%" class="table table-condensed">
        <th WIDTH="50%">@include('almacen.carrito.search')</th>
        <th WIDTH="20%"></th>
      </table>
</div>
<div class="" align="right">
    <img   align="right" class="img-responsive" src="{{asset ('img/ico-carrito.png')}}" width="100" height="100">
</div>

  <div ALIGN="center" class="row">
  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  		<div class="table-responsive">
  			<table class="table table-striped table-bordered table-condensed table-hover">
  				<thead>
  					<th>Num. Progreso</th>
            <th>Clave</th>
  					<th>Nombre herramienta</th>
  					<th>Categoria</th>
            <th>Cantidad</th>
            <th>Unidad</th>
            <th>Portador</th>
  					<th>Opciones</th>
  				</thead>
                 @foreach ($carrito as $cat)
  				<tr>
  					<td>{{ $cat->num_progre}}</td>
            <td>{{ $cat->clave}}</td>
  					<td>{{ $cat->nombre}}</td>
  					<td>{{ $cat->categoria}}</td>
            <td>{{ $cat->cantidad}}</td>
            <td>{{ $cat->unidad}}</td>
            <td>{{ $cat->portador}}</td>
  					<td>

             <a href="" data-target="#modal-delete-{{$cat->clave}}" data-toggle="modal"><button class="btn btn-danger">Cancelar</button></a>

            </td>
  				</tr>
  				@include('almacen.carrito.modal')
  				@endforeach
  			</table>
  		</div>
  		{{$carrito->render()}}
  	</div>


    </div>
    </div>

    <div  ALIGN="center" class="row">
          <a href="{{url('/generar_salida')}}" target="_blank" > <button class="btn btn-primary" type="submit">Generar Reporte</button></a> 
  <a href="{{url('/terminar_salida')}}" > <button class="btn btn-danger" type="submit">Realizar Salida</button></a>
        </div>
@endsection
