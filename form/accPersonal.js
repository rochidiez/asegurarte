/**
 * Constantes
 */
var PROVINCIA_CAPITAL_FEDERAL = 1;

/*
 * jQuery UI Dialog: Hide the Close Button/Title Bar
 * http://salman-w.blogspot.com/2013/05/jquery-ui-dialog-examples.html
 */
$().ready(function() {
	$("#dialogoMensaje").dialog({
		autoOpen : false,
		modal : true,
		dialogClass : "dlg-no-close"
	});
	$("#btDialogoAceptar").on("click", function() {
		$("#dialogoMensaje").dialog("close");
	});

	$("#acc_CVIGENCIAINI").datepicker({
		format : 'dd/mm/yyyy'
	});
	$("#acc_CVIGENCIAFIN").datepicker({
		format : 'dd/mm/yyyy'
	});

	$('#tablaProducto').bootstrapTable().on('check.bs.table', function(e, row) {
		$("#acc_CPRODUCTO").val(row.producto);
	}).on('load-success.bs.table', function(e, data) {
		fnAccProductoChekedUpd();
	});

	inicializaVariables();

});


/**
 * El include FACEBOOK va a llamar a esta función
 */
function statusChangeCallback(response) {
	if (response.status === 'connected') {
		FB.api('/me', function(response) {
			var fldEmail = $("#acc_CEMAIL");
			var fldName = $("#acc_CRAZONSOCIAL");
			fldEmail.val(response.email);
			fldName.val(response.name);
			// panel.fnVerificaMail(fldEmail);
			try {
				$('#czte_acc_login_facebook').hide();
			} catch (e) {
			}
			fnLeerFormByEmail();
		});
	} else if (response.status === 'not_authorized') {
		mensajeAlerta('No se concretó correctamente la conexión vía Facebook');
	} else {
		mensajeAlerta('Por favor, conectese utilizando su Email o Facebook');
	}
}

function mensajeAlerta(cMensaje, fnCallback) {
	$("#dialogoMensaje_text").html(cMensaje);
	$("#dialogoMensaje").dialog({
		show : 'slide',
		close : function(event, ui) {
			if (typeof (fnCallback) == 'function')
				fnCallback();
		}
	});
	$("#dialogoMensaje").dialog("open");
}

function validaEmailMsg(sEmail) {
	if (sEmail == '')
		return;
	if (!validaEmail(sEmail)) {
		mensajeAlerta('Email no es válido');
		return;
	}
	fnLeerFormByEmail();
}

function validaCuitMsg(nCuit) {
	if (nCuit == '')
		return;
	if (!validaCuit(nCuit)) {
		mensajeAlerta('CUIT no es válido');
		return false;
	}
	fnGrabarParcial(nCuit);
}

/**
 * Eventos
 */

/**
 * <p>
 * Actualiza checkbox de la tabla segun del valor de acc_CPRODUCTO
 * </p>
 */
function fnAccProductoChekedUpd() {
	if ($("#acc_CPRODUCTO").val() == 'A') {
		$('#tablaProducto').bootstrapTable('updateRow', {
			index : 0,
			row : {
				state : true
			}
		});
	} else if ($("#acc_CPRODUCTO").val() == 'B') {
		$('#tablaProducto').bootstrapTable('updateRow', {
			index : 1,
			row : {
				state : true
			}
		});
	}
}

function fnFPostalChange() {
	var fld_FPROVINCIA = $('#acc_FPROVINCIA');
	if (fld_FPROVINCIA.val() == PROVINCIA_CAPITAL_FEDERAL)
		return;

	var fld_FPOSTAL = $('#acc_FPOSTAL');
	var fld_NPOSTAL = $('#acc_NPOSTAL');

	var selected = fld_FPOSTAL.find('option:selected');
	var nPostal = selected.data('npostal');

	fld_NPOSTAL.attr("disabled", true);
	fld_NPOSTAL.val(nPostal);

	return;
}

function operProvincia(fnCallback) {

	$.ajax({
		url : 'srv/dataGetJson.php',
		data : {
			'prm_dataSource' : 'cotizarte',
			'prm_funcion' : 'paCotizarteAGV.operProvincia'
		},
		type : 'post',
		success : function(data) {
			var regs = jQuery.parseJSON(data).records;
			var combo = $("#acc_FPROVINCIA");
			combo.empty();
			combo.append("<option value='' selected>Provincia</option>");
			for (var i = 0; i < regs.length; i++) {
				combo.append("<option value='" + regs[i].PPROVINCIA + "' selected>" + regs[i].CNOMBRE + "</option>");
			}
			if (typeof (fnCallback) == 'function')
				fnCallback(combo);
			else
				combo.val('');
		},
		error : function(xhr, ajaxOptions, thrownError) {
			mensajeAlerta('Error al leer datos de provincia');
		}
	});
}

function operLocalidad(fProvincia, fnCallback) {
	if (fProvincia == undefined)
		return;

	var combo = $("#acc_FPOSTAL");
	var fld_NPOSTAL = $('#acc_NPOSTAL');
	if (fProvincia == PROVINCIA_CAPITAL_FEDERAL) {
		combo.val('');
		combo.attr("disabled", true);

		fld_NPOSTAL.attr("disabled", false);

		return;
	}
	combo.attr("disabled", false);
	fld_NPOSTAL.val('');

	$.blockUI({
		message : '<h3><img src="img/busy.gif" /> Espere, cargando localidades...</h3>'
	});
	$.ajax({
		url : 'srv/dataGetJson.php',
		data : {
			'prm_dataSource' : 'cotizarte',
			'prm_funcion' : 'paCotizarteAGV.operLocalidad',
			'prm_fProvincia' : fProvincia
		},
		type : 'post',
		success : function(data) {
			var regs = jQuery.parseJSON(data).records;
			combo.empty();
			combo.append("<option value='' selected>Localidad</option>");
			for (var i = 0; i < regs.length; i++) {
				combo.append("<option value='" + regs[i].PPOSTAL + "' data-npostal='" + regs[i].NPOSTAL + "' >"
						+ regs[i].CLOCALIDAD + "</option>");
			}
			if (typeof (fnCallback) == 'function')
				fnCallback(combo);
			else
				combo.val('');
			$.unblockUI();
		},
		error : function(xhr, ajaxOptions, thrownError) {
			$.unblockUI();
			mensajeAlerta('Error al leer datos de provincia');
		}
	});
}

function fnLimpiaForm() {
	$('#acc_PACCPERSONAL').val('');
	$('#acc_CEMAIL').val('');
	$('#acc_CRAZONSOCIAL').val('');
	$('#acc_NCUIT').val('');
	$('#acc_CDOMICILIO').val('');
	$('#acc_FPROVINCIA').val('');
	$('#acc_FPOSTAL').val('');
	$('#acc_NPOSTAL').val('');
	$('#acc_CCONTACTO').val('');
	$('#acc_CVIGENCIAINI').val('');
	$('#acc_CVIGENCIAFIN').val('');
	$('#acc_CNOMBRESUSC').val('');
	$('#acc_CDOCUMENTOSUSC').val('');
	$('#acc_CACTIVIDAD').val('');
	$('#acc_FFORMAPAGO').val('');
}

function fnLeerFormByEmail() {
	var fld_CEMAIL = $('#acc_CEMAIL');
	if (fld_CEMAIL.val() == '')
		return;

	$.blockUI({
		message : '<h3><img src="img/busy.gif" />'
				+ ' Espere, verificando si su mail ya tiene solicitudes cargadas ...' + '</h3>'
	});

	$.ajax({
		url : 'form/getAccPersonal.php',
		data : {
			'prm_CEMAIL' : fld_CEMAIL.val()
		},
		type : 'post',
		success : function(data) {
			var info = jQuery.parseJSON(data).records;
			if (info.length == 0) {
				// Si no existe se hace una grabacion parcial
				fnGrabarParcial(fld_CEMAIL.val());
				$.unblockUI();
				return;
			}
			// Extrae solo el primer registro
			info = info[0];
			// Copia datos desde info al formuario
			fnLimpiaForm();
			for ( var prm in info) {
				if (prm == 'FFORMAPAGO')
					$('#acc_' + prm + info[prm]).prop("checked", true);
				else
					$('#acc_' + prm).val(info[prm]);
			}

			// Actualiza checkbox de la tabla segun del valor de acc_CPRODUCTO
			fnAccProductoChekedUpd();

			if (info.FPROVINCIA != '') {
				// Si hay valor de provincia, se llena la combo de localidades
				operLocalidad(info.FPROVINCIA, function(cbPostal) {
					// Con la combo de localidades llena se pone
					// el valor de la localidad en la combo
					cbPostal.val(info.FPOSTAL);
					fnFPostalChange();
				});
			}
			$.unblockUI();
		},
		error : function(xhr, ajaxOptions, thrownError) {
			$.unblockUI();
			mensajeAlerta('Error al actualizar datos');
		}
	});
}

function fnGrabarParcial(valor) {
	if (valor === undefined || valor == '')
		return false;
	if ($('#acc_CEMAIL').val() == '')
		return false;
	if ($('#acc_FESTADOWKF').val() > 1)
		return false;

	// AJAX
	$.ajax({
		url : 'srv/dataAccPersonalUpdParcial.php',
		data : {
			'acc_PACCPERSONAL' : $('#acc_PACCPERSONAL').val(),
			'acc_CEMAIL' : $('#acc_CEMAIL').val(),
			'acc_CRAZONSOCIAL' : $('#acc_CRAZONSOCIAL').val().toUpperCase(),
			'acc_NCUIT' : toNumberEmpty($('#acc_NCUIT').val()),
			'acc_CDOMICILIO' : $('#acc_CDOMICILIO').val(),
			'acc_FPROVINCIA' : $('#acc_FPROVINCIA').val(),
			'acc_FPOSTAL' : $('#acc_FPOSTAL').val(),
			'acc_NPOSTAL' : toNumberEmpty($('#acc_NPOSTAL').val()),
			'acc_CCONTACTO' : $('#acc_CCONTACTO').val(),
			'acc_CVIGENCIAINI' : $('#acc_CVIGENCIAINI').val(),
			'acc_CVIGENCIAFIN' : $('#acc_CVIGENCIAFIN').val(),
			'acc_CNOMBRESUSC' : $('#acc_CNOMBRESUSC').val().toUpperCase(),
			'acc_CDOCUMENTOSUSC' : $('#acc_CDOCUMENTOSUSC').val(),
			'acc_CACTIVIDAD' : $('#acc_CACTIVIDAD').val(),
			'acc_CPRODUCTO' : $('#acc_CPRODUCTO').val(),
			'acc_FFORMAPAGO' : $('#acc_FFORMAPAGO').val()
		},
		type : 'post',
		success : function(data) {
			var info = jQuery.parseJSON(data).records[0];
			if (info.NESTADO > 0)
				$('#acc_PACCPERSONAL').val(info.NESTADO);
		},
		error : function(xhr, ajaxOptions, thrownError) {
		}
	});
}

function fnGrabar() {
	// Validaciones
	var fld_CEMAIL = $('#acc_CEMAIL');
	if (fld_CEMAIL.val() == '') {
		mensajeAlerta('Debe indicar correo electrónico');
		return false;
	}

	var fld_CRAZONSOCIAL = $('#acc_CRAZONSOCIAL');
	if (fld_CRAZONSOCIAL.val() == '') {
		mensajeAlerta('Debe indicar nombre o razón social');
		return false;
	}
	fld_CRAZONSOCIAL.val(fld_CRAZONSOCIAL.val().toUpperCase());

	var fld_NCUIT = $('#acc_NCUIT');
	if (fld_NCUIT.val() == '') {
		mensajeAlerta('Debe indicar CUIT');
		return false;
	}
	if (!validaCuit(fld_NCUIT.val())) {
		mensajeAlerta('CUIT erroneo');
		return false;
	}

	var fld_CCONTACTO = $('#acc_CCONTACTO');
	if (fld_CCONTACTO.val() == '') {
		mensajeAlerta('Debe indicar al menos un teléfono de contacto');
		return false;
	}
	// Arregla según tipo de dato
	var fld_NPOSTAL = $('#acc_NPOSTAL');
	{
		var n = toNumber(fld_NPOSTAL.val());
		if (n === false)
			fld_NPOSTAL.val('');
		else
			fld_NPOSTAL.val(Math.abs(n));
	}

	var fld_CNOMBRESUSC = $('#acc_CNOMBRESUSC');
	fld_CNOMBRESUSC.val(fld_CNOMBRESUSC.val().toUpperCase());

	var fld_FESTADOWKF = $('#acc_FESTADOWKF');
	{
		var n = toNumber(fld_FESTADOWKF.val());
		if (n === false)
			fld_FESTADOWKF.val(1);
		else
			fld_FESTADOWKF.val(n);
	}

	// Indica que debe enviar el mail de aceoptación
	var fld_BMAIL = $('#acc_BMAIL');
	fld_BMAIL.val('1');

	$.blockUI({
		message : '<h3><img src="img/busy.gif" /> Espere, actualizando ...</h3>'
	});

	$('#accPersonalForm').submit();
}
