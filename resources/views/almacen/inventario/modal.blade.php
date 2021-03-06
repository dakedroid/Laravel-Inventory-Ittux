<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$cat->num_progre}}">
	{{Form::Open(array('action'=>array('InventarioController@destroy',$cat->num_progre),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar inventario</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="nombre">Nombre inventario</label>
					<input type="text" name="nombre" class="form-control" placeholder="Nombre inventario...">
				</div>
				<div class="form-group">
						<label for="clave">Clave</label>
						<input type="text" name="clave" class="form-control" placeholder="Clave...">
				</div>
				<p>Confirme si desea Eliminar la inventario</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
