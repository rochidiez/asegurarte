<div class="js" style="height: 590px;">
	<form id="accPersonalForm" method="post" action="formAccPersonal.php" class="col-lg-12 col-md-12 col-sm-12 cont-form col-xs-12 form-horizontal clearfix pt" role="form">
		<!-- Esto hace que el submit avance a la siguiente página -->
		<input id="acc_PACCPRESONAL" name="acc_PACCPRESONAL" type="hidden" />
		<input id="acc_FESTADOWKF" name="acc_FESTADOWKF" type="hidden" />
		<input id="acc_BMAIL" name="acc_BMAIL" type="hidden" value="0" />

		<div class="container relative clearfix cb">
			<div class="mT20xs col-lg-12 col-md-12 col-sm-12 col-xs-12 relative clearfix wow fadeInRight" data-wow-duration="0.7s" data-wow-delay="0.8s">
			
				<div class="form-group">
					<label>Asegurados</label>
				</div>
			
				<div class="form-group">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 relative txl">
						<input type="button" value="Nuevo Asegurado" onclick="fnEditAsegurado();" class="btn btn-gray col-lg-12 col-md-12 col-sm-12 col-xs-12" />						
					</div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 relative txl"></div>
				</div>
					
					
				<div class="form-group">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
						<table id="acc_ASEGURADOS" data-url="form/getListAccPersonalAsegurado.php" class="table"
							   data-toggle="table" >
							<thead>
								<tr>
									<th data-field="CNOMBRE"		data-sortable="true">Nombre y Apellido</th>
									<th data-field="NDNI"			data-sortable="true">DNI</th>
									<th data-field="CNACIMIENTO"	data-sortable="true">Fec.Nacimiento</th>
									<th data-field="CACTIVIDAD"		data-sortable="true">Actividad</th>
									<th data-field="operate" data-formatter="formatoAccion" data-events="eventosAccion">Acción</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 relative txl">
						<a href="formAccPersonal.php" class="btn btn-primary col-lg-12 col-xs-12">Anterior</a>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 relative txl"></div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 relative txl">
						<a href="formAccPersonalFinal.php" class="btn btn-primary col-lg-12 col-xs-12">Cotizar</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>