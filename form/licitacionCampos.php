<div class="js" style="height: 320px;">
	<form id="licitacionForm" method="post" action="formLicitacion.php"
		class="col-lg-12 col-md-12 col-sm-12 cont-form col-xs-12 form-horizontal clearfix pt"
		role="form">

		<!-- Esto hace que el submit avance a la siguiente página -->
		<input id="lic_PLICITACION" name="lic_PLICITACION" type="hidden" /> 
		<input id="lic_FESTADOWKF" name="lic_FESTADOWKF" type="hidden" />
		<input id="lic_BMAIL" name="lic_BMAIL" type="hidden" value="0" />

		<div class="container relative clearfix cb">
					<div class="form-group">
						<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative pL0">
							<strong><span style="color: red;">IMPORTANTE:</span> PERSONAL DOMESTICO</strong>.
							Según la Res. SRT 2224/2014, a partir del día 10/12/2014,
							aquellos que no tengan un contrato emitido o en proceso pasaran a
							tener una ART ASIGNADA POR OFICIO (No se cotizan nuevos
							contratos).
						</span>
					</div>
		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative clearfix contBox">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 relative clearfix wow fadeInLeft"
					data-wow-duration="0.7s" data-wow-delay="0.5s">
					
					<div id="czte_lic_login_facebook" class="form-group" style="height: 30px;">
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
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<input name="lic_CEMAIL" id="lic_CEMAIL" type="text"
								onblur="validaEmailMsg($('#lic_CEMAIL').val());"
								class="form-control input-sm" placeholder="Correo electrónico" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<input name="lic_CRAZONSOCIAL" id="lic_CRAZONSOCIAL" type="text"
								onblur="fnGrabarParcial($(this).val());"
								class="form-control input-sm"
								placeholder="Nombre o Razón social" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<input name="lic_NCUIT" id="lic_NCUIT" type="text"
								onblur="validaCuitMsg($('#lic_NCUIT').val()); fnGrabarParcial($(this).val());"
								class="form-control input-sm" placeholder="CUIT" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 relative txl">
							<input name="lic_CCONTACTO" id="lic_CCONTACTO" type="text"
								onblur="fnGrabarParcial($(this).val());"
								class="form-control input-sm" placeholder="Teléfono Contacto" />
						</div>
					</div>	
				</div>


				<div class="mT20xs col-lg-6 col-md-6 col-sm-6 col-xs-12 relative clearfix wow fadeInRight"
					data-wow-duration="0.7s" data-wow-delay="0.8s">

					<div id="czte_lic_login_facebook" class="form-group" style="height: 30px;">
						&nbsp;
					</div>
					<div class="form-group">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 relative txl">
							<input name="lic_NCAPITAS" id="lic_NCAPITAS" type="text"
								onblur="fnGrabarParcial($(this).val());"
								class="form-control input-sm"
								placeholder="Cantidad de Empleados" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 relative txl">
							<input name="lic_MNOMINA" id="lic_MNOMINA" type="text"
								onblur="fnGrabarParcial($(this).val());"
								class="form-control input-sm" placeholder="Total Sueldos $" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<select name="lic_FARTACTUAL" id="lic_FARTACTUAL"
								onchange="fnGrabarParcial($(this).val());"
								class="form-control input-sm">
								<option value=''>ART Actual</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 relative txl">
							<input name="lic_NFIJO_ARTACTUAL" id="lic_NFIJO_ARTACTUAL"
								onblur="fnGrabarParcial($(this).val());" type="text"
								class="form-control input-sm" placeholder="Importe Fijo" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 relative txl">
							<input name="lic_MALICUOTA_ARTACTUAL"
								onblur="fnGrabarParcial($(this).val());"
								id="lic_MALICUOTA_ARTACTUAL" type="text"
								class="form-control input-sm" placeholder="Alícuota %" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 relative txl">
							<input id='lic_CODVERIFICA' name='lic_CODVERIFICA' type="text"
								class="form-control input-sm"
								placeholder="Ingrese las 5 letras de arriba" />
						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 relative txl">
							<button type="button" onclick="fnGrabar();"
								class="btn btn-primary col-lg-12 col-xs-12">Cotizar</button>
						</div>
					</div>
				</div>
				<!-- contCotizar -->
			</div>
		</div>
		
					<div class="form-group" style="visibility: hidden;">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<input name="lic_CDOMICILIO" id="lic_CDOMICILIO" type="text"
								onblur="fnGrabarParcial($(this).val());"
								class="form-control input-sm" placeholder="Domicilio" />
						</div>
					</div>
		
					<div class="form-group" style="visibility: hidden;">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<select name="lic_FPROVINCIA" id="lic_FPROVINCIA"
								class="form-control input-sm"
								onchange="operLocalidad($('#lic_FPROVINCIA').val());fnGrabarParcial($(this).val());">
								<option value=''>Provincia</option>
							</select>
						</div>
					</div>

					<div class="form-group" style="visibility: hidden;">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative txl">
							<select name="lic_FPOSTAL" id="lic_FPOSTAL"
								onchange="fnFPostalChange();fnGrabarParcial($(this).val());"
								class="form-control input-sm">
								<option value=''>Localidad</option>
							</select>
						</div>
					</div>

					<div class="form-group" style="visibility: hidden;">
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 relative txl">
							<input name="lic_NPOSTAL" id="lic_NPOSTAL" type="text"
								onblur="fnGrabarParcial($(this).val());"
								class="form-control input-sm" placeholder="Código Postal" />
						</div>
					</div>
		
	</form>
</div>
<!-- container -->
