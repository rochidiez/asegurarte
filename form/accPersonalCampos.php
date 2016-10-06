<div class="js" style="height: 590px;">
	<form id="accPersonalForm" method="post" action="formAccPersonal.php" class="col-lg-12 col-md-12 col-sm-12 cont-form col-xs-12 form-horizontal clearfix pt" role="form">

		<!-- Esto hace que el submit avance a la siguiente página -->
		<input id="acc_PACCPERSONAL" name="acc_PACCPERSONAL" type="hidden" />
		<input id="acc_FESTADOWKF"	 name="acc_FESTADOWKF"	 type="hidden" />
		<input id="acc_BMAIL"		 name="acc_BMAIL"		 type="hidden" value="0" />
		<input id="acc_CPRODUCTO" 	 name="acc_CPRODUCTO" 	 type="hidden" />
		
		<div class="container relative clearfix cb">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative clearfix contBox">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 relative clearfix wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">

					<div class="form-group">
						<label>Tomador</label>
					</div>
					<div class="form-group">
						<div id="czte_acc_login_facebook" class="form-group" style="height: 30px;">
							<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative pL0">
								<p
									class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative p0 txl ptB mB5">
									Ingrese su correo electrónico o
									<fb:login-button id="" scope="public_profile,email"
										onlogin="checkLoginState();" max-rows="10" size="large"
										show-faces="false" auto-logout-link="false">
									</fb:login-button>
								</p>
							</span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<input name="acc_CEMAIL" id="acc_CEMAIL" placeholder="Correo electronico" onblur="validaEmailMsg($('#acc_CEMAIL').val());" type="text" class="form-control input-sm" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 relative txl">
							<input name="acc_NCUIT" id="acc_NCUIT" placeholder="CUIT" type="text" onblur="validaCuitMsg($('#acc_NCUIT').val());" class="form-control input-sm"  />
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 relative txl">
							<input name="acc_CRAZONSOCIAL" id="acc_CRAZONSOCIAL" placeholder="Nombre y Apellido ó Razón Social" onblur="fnGrabarParcial($(this).val());" type="text" class="form-control input-sm" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<input name="acc_CDOMICILIO" id="acc_CDOMICILIO" placeholder="Domicilio" onblur="fnGrabarParcial($(this).val());" type="text" class="form-control input-sm" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 relative txl">
							<select name="acc_FPROVINCIA" id="acc_FPROVINCIA" onchange="operLocalidad($('#acc_FPROVINCIA').val());" class="form-control input-sm" >
								<option value=''>Provincia</option>
							</select>
						</div>

						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 relative txl">
							<select name="acc_FPOSTAL" id="acc_FPOSTAL" onchange="fnFPostalChange();" class="form-control input-sm">
								<option value=''>Localidad</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 relative txl">
							<input name="acc_NPOSTAL" id="acc_NPOSTAL" placeholder="Código Postal" onblur="fnGrabarParcial($(this).val());" type="text" class="form-control input-sm" />
						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 relative txl">
							<input name="acc_CCONTACTO" id="acc_CCONTACTO" placeholder="Teléfono Contacto" onblur="fnGrabarParcial($(this).val());" type="text" class="form-control input-sm" />
						</div>
					</div>
					<div class="form-group">
						<label>Vigencia</label>
					</div>
					<div class="form-group">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 relative txl">
							<input name="acc_CVIGENCIAINI" id="acc_CVIGENCIAINI" placeholder="Inicio Vigencia" onblur="fnGrabarParcial($(this).val());" type="text" class="form-control input-sm" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 relative txl">
							<input name="acc_CVIGENCIAFIN" id="acc_CVIGENCIAFIN" placeholder="Término Vigencia" onblur="fnGrabarParcial($(this).val());" data-date-format="mm/dd/yyyy" type="text" class="form-control input-sm" />
						</div>
					</div>
					<div class="form-group">
						<label>Clausula de NO repetición a favor de</label>
					</div>
					<div class="form-group">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 relative txl">
							<input name="acc_CNOMBRESUSC" id="acc_CNOMBRESUSC" placeholder="Nombre" onblur="fnGrabarParcial($(this).val());" type="text" class="form-control input-sm" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 relative txl">
							<input name="acc_CDOCUMENTOSUSC" id="acc_CDOCUMENTOSUSC" placeholder="DNI ó CUIT" onblur="fnGrabarParcial($(this).val());" type="text" class="form-control input-sm" />
						</div>
					</div>

				</div>
				<div class="mT20xs col-lg-6 col-md-6 col-sm-6 col-xs-12 relative clearfix wow fadeInRight" data-wow-duration="0.7s" data-wow-delay="0.8s">
					<div class="form-group">
						<label>Actividad del Empleador</label>
					</div>
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<input name="acc_CACTIVIDAD" id="acc_CACTIVIDAD" type="text" class="form-control input-sm" placeholder="Actividad" onblur="fnGrabarParcial($(this).val());"/>
						</div>
					</div>
					
					<div class="form-group">
						<label>Sumas Aseguradas</label>
					</div>
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
						
							<!-- table id="acc_ASEGURADOS" class="display table table-bordered" data-url="form/getListProducto.php"> -->
							<!-- data-select-item-name="radioName" -->
							<table id="tablaProducto" data-url="form/getListProducto.php" class="table" 
							       data-toggle="table"
							       data-click-to-select="true" 
								   data-single-select="true"							       
							       >
								<thead>
									<tr>
 										<th data-field="state" 	  data-checkbox="true" data-formatter="setAccProducto"></th> <!-- data-radio="true" -->
										<th data-field="producto" data-align="center">
											<span style="font-size:small; text-align: center;">
												Producto&nbsp;<br/>
												&nbsp;<br/>
												&nbsp;<br/>
												&nbsp;<br/>
											</span>
										</th>
										<th data-field="sumaMuerte" data-align="center">
											<span style="font-size:small; text-align: center;">
												Suma<br/>
												asegurada<br/>
												por muerte&nbsp;<br/>
												&nbsp;<br/>
											</span>
										</th>
										<th data-field="sumaInvalidez" data-align="center">
											<span style="font-size:small; text-align: center;">
												Suma asegurada por <br/>
												invalidez total y/o <br/>
												parcial permanente  <br/>
												por accidente <br/>
											</span>
										</th>
										<th data-field="sumaReembolso" data-align="center">
											<span style="font-size:small; text-align: center;">
												Reembolso de gastos <br/>
												por asistencia médico <br/>
												farmaceutica <br/>
												por accidente <br/>
											</span>
										</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>

					<div class="form-group">
						<label>Forma de pago</label>
					</div>
					<div class="form-group">
						<div id="radioFormaPago"
							class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl small">
							<input name="acc_FFORMAPAGO" id="acc_FFORMAPAGO1" type="radio" checked="checked" value="1">
							<label>CBU</label>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input name="acc_FFORMAPAGO" id="acc_FFORMAPAGO2" type="radio" value="2">
							<label>Tarjeta de Crédito</label>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 relative txl"></div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 relative txl">
							<button type="button" onclick="fnGrabar();" class="btn btn-primary col-lg-12 col-xs-12">Siguiente</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>