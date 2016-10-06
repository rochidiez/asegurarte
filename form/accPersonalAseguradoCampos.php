<div id="dialogoAsegurado" class="js">
	<form id="accPersonalAseguradoForm" method="post" action="formAccPersonalAsegurados.php" class="col-lg-12 col-md-12 col-sm-12 cont-form col-xs-12 form-horizontal clearfix pt" role="form">
		<input type="hidden" name="ase_PASEGURADO" id="ase_PASEGURADO"/>
		<div class="container relative clearfix cb" style="width:580px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative clearfix wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
				<div class="form-group">
					<label>Datos Asegurado</label>
				</div>
				
				<div class="form-group">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 relative txl">
						<button name="ase_ACCION" id="ase_ACCION" onclick="$('#dialogoAsegurado').dialog('close'); submit();" class="btn btn-primary btn-xs col-lg-12 col-xs-12" value="Actualizar">Aceptar</button>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 relative txl"></div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 relative txl">
						<button onclick="$('#dialogoAsegurado').dialog('close'); return false;" class="btn btn-primary btn-xs col-lg-12 col-xs-12">Volver</button>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 relative txl">
						<input name="ase_CNOMBRE" id="ase_CNOMBRE" placeholder="Nombre y Apellido" type="text" class="form-control input-sm" />
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 relative txl">
						<input name="ase_NDNI" id="ase_NDNI" placeholder="DNI" onblur="validaDniMsg($('#ase_NDNI').val());" type="text" class="form-control input-sm"  />
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 relative txl">
						<input name="ase_CNACIMIENTO" id="ase_CNACIMIENTO" placeholder="Fecha de Nacimiento" type="text" class="form-control input-sm" />
					</div>

					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 relative txl">
						<input name="ase_CACTIVIDAD" id="ase_CACTIVIDAD" placeholder="Actividad" type="text" class="form-control input-sm" />
					</div>
				</div>
			</div>
		</div>
	</form>
</div>