/**
 * Constantes
 */
var PROVINCIA_CAPITAL_FEDERAL = 1;
// var $ = jQuery.noConflict();

/**
 * El include FACEBOOK va a llamar a esta función
 */
function statusChangeCallback(response) {
	if (response.status === 'connected') {
		FB.api('/me', function(response) {
			var fldEmail = $("#lic_CEMAIL");
			var fldName = $("#lic_CRAZONSOCIAL");
			fldEmail.val(response.email);
			fldName.val(response.name);
			// panel.fnVerificaMail(fldEmail);
			try {
				$('#czte_lic_login_facebook').hide();
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

function validaEmail(sEmail) {
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (filter.test(sEmail)) {
		return true;
	} else {
		return false;
	}
}

/**
 * Valida digito verificados de la CUIT
 * 
 * @param {int}
 *            numCuit
 * @return {Boolean}
 */
function validaCuit(numCuit) {
	if (numCuit.length != 11 || isNaN(numCuit))
		return false;
	var cerosIzq = /[0]*/;
	if (cerosIzq.test(numCuit))
		numCuit = numCuit.replace(cerosIzq, '');
	if ((numCuit = parseInt(numCuit)) == NaN)
		return false;
	var dig = 0, suma = 0;
	dvCuit = numCuit % 10;
	numCuit = Math.floor(numCuit / 10);
	for (; numCuit; numCuit = Math.floor(numCuit / 10))
		suma = (suma + numCuit % 10 * ((dig++ % 6) + 2));
	dvCal = ((suma % 11) ? 11 - (suma % 11) : 0);
	return (dvCal == dvCuit);
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
	if( nCuit == '' )
		return;
	if (!validaCuit(nCuit))
		mensajeAlerta('CUIT no es válido');
}

function toNumberEmpty(cVal, nDec) {
	var n = toNumber(cVal, nDec);
	if (n === false)
		return '';
	return n;
}

function toNumber(cVal, nDec) {
	if (cVal == '')
		return false;

	numRes = NaN;
	if (nDec == undefined || nDec <= 0) {
		// Entero
		numRes = parseInt(cVal);
	} else {
		// Decimal
		// reemplaza comas por puntos
		cVal = cVal.replace(/,/g, ".");
		numRes = parseFloat(cVal);
		if (!isNaN(numRes))
			numRes = numRes.toFixed(nDec);
	}
	if (isNaN(numRes))
		return false;
	return numRes;
}

/**
 * Eventos
 */
function fnFPostalChange() {
	var fld_FPROVINCIA = $('#lic_FPROVINCIA');
	if (fld_FPROVINCIA.val() == PROVINCIA_CAPITAL_FEDERAL)
		return;

	var fld_FPOSTAL = $('#lic_FPOSTAL');
	var fld_NPOSTAL = $('#lic_NPOSTAL');

	var selected = fld_FPOSTAL.find('option:selected');
	var nPostal = selected.data('npostal');

	fld_NPOSTAL.attr("disabled", true);
	fld_NPOSTAL.val(nPostal);

	return;

}

function operArt(fnCallback) {

	$.ajax({
		url : 'srv/dataGetJson.php',
		data : {
			'prm_dataSource' : 'cotizarte',
			'prm_funcion' : 'paCotizarteAGV.operArt'
		},
		type : 'post',
		success : function(data) {
			var regs = jQuery.parseJSON(data).records;
			var combo = $("#lic_FARTACTUAL");
			combo.empty();
			combo.append("<option value='' selected>ART Actual</option>");
			for (var i = 0; i < regs.length; i++) {
				combo.append("<option value='" + regs[i].PART + "' selected>" + regs[i].CRAZONSOCIAL + "</option>");
			}
			if (typeof (fnCallback) == 'function')
				fnCallback(combo);
			else
				combo.val('');

		},
		error : function(xhr, ajaxOptions, thrownError) {
			mensajeAlerta('Error al leer datos de ART');
		}
	});
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
			var combo = $("#lic_FPROVINCIA");
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
	var combo = $("#lic_FPOSTAL");
	var fld_NPOSTAL = $('#lic_NPOSTAL');
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

function fnLeerFormByEmail() {
	var fld_CEMAIL = $('#lic_CEMAIL');
	$.blockUI({
		message : '<h3><img src="img/busy.gif" />'
				+ ' Espere, verificando si su mail ya tiene solicitudes cargadas ...' + '</h3>'
	});
	$.ajax({
		url : 'srv/dataLicitacionEmail.php',
		data : {
			'prm_CEMAIL' : fld_CEMAIL.val()
		},
		type : 'post',
		success : function(data) {
			var info = jQuery.parseJSON(data).records;
			if (info.length == 0) {
				// Si no existe se hace una grabación parcial
				fnGrabarParcial(fld_CEMAIL.val());
				$.unblockUI();
				return;
			}
			// Extrae solo el primer registro
			info = info[0];
			// COpia datos desde info al formuario
			for ( var prm in info)
				$('#lic_' + prm).val(info[prm]);

			if (info.FPROVINCIA != '') {
				// Si hay valor de provincia, se llena la combo de localidades
				operLocalidad(info.FPROVINCIA, function(cbPostal) {
					// Con la combo de localidades llena se pone
					// el valor de la localidad en la combo
					cbPostal.val(info.FPOSTAL);
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
	if( valor === undefined || valor == '')
		return false;
	if( $('#lic_FESTADOWKF').val() > 1 )
		return false;

	// AJAX
	$.ajax({
		url : 'srv/dataLicitacionUpdParcial.php',
		data : {
			'lic_PLICITACION' : $('#lic_PLICITACION').val(),
			'lic_CEMAIL' : $('#lic_CEMAIL').val(),
			'lic_CRAZONSOCIAL' : $('#lic_CRAZONSOCIAL').val().toUpperCase(),
			'lic_NCUIT' : toNumberEmpty($('#lic_NCUIT').val()),
			'lic_FPROVINCIA' : $('#lic_FPROVINCIA').val(),
			'lic_CDOMICILIO' : $('#lic_CDOMICILIO').val(),
			'lic_FPOSTAL' : $('#lic_FPOSTAL').val(),
			'lic_NPOSTAL' : toNumberEmpty($('#lic_NPOSTAL').val()),
			'lic_CCONTACTO' : $('#lic_CCONTACTO').val(),
			'lic_NCAPITAS' : toNumberEmpty($('#lic_NCAPITAS').val()),
			'lic_MNOMINA' : toNumberEmpty($('#lic_MNOMINA').val()),
			'lic_FARTACTUAL' : $('#lic_FARTACTUAL').val(),
			'lic_FESTADOWKF' : $('#lic_FESTADOWKF').val(),
			'lic_NFIJO_ARTACTUAL' : toNumberEmpty($('#lic_NFIJO_ARTACTUAL').val()),
			'lic_MALICUOTA_ARTACTUAL' : toNumberEmpty($('#lic_MALICUOTA_ARTACTUAL').val()),
			'lic_BMAIL' : '0'
		},
		type : 'post',
		success : function(data) {
			var info = jQuery.parseJSON(data).records[0];
			if (info.NESTADO > 0)
				$('#lic_PLICITACION').val(info.NESTADO);
		},
		error : function(xhr, ajaxOptions, thrownError) {
		}
	});

}

function fnGrabar() {
	var fld_CEMAIL = $('#lic_CEMAIL');
	if (!validaEmail(fld_CEMAIL.val())) {
		mensajeAlerta('Email no es válido');
		return false;
	}

	var fld_CRAZONSOCIAL = $('#lic_CRAZONSOCIAL');
	if (fld_CRAZONSOCIAL.val() == '') {
		mensajeAlerta('Debe indicar nombre o razón social');
		return false;
	}
	fld_CRAZONSOCIAL.val(fld_CRAZONSOCIAL.val().toUpperCase());

	var fld_NCUIT = $('#lic_NCUIT');
	if (fld_NCUIT.val() == '') {
		mensajeAlerta('Debe indicar CUIT');
		return false;
	}
	if (!validaCuit(fld_NCUIT.val())) {
		mensajeAlerta('CUIT erroneo');
		return false;
	}

//	var fld_FPROVINCIA = $('#lic_FPROVINCIA');
//	if (fld_FPROVINCIA.val() == '') {
//		mensajeAlerta('Debe indicar provincia');
//		return false;
//	}

//	var fld_CDOMICILIO = $('#lic_CDOMICILIO');
//	if (fld_CDOMICILIO.val() == '') {
//		mensajeAlerta('Debe indicar domicilio');
//		return false;
//	}

//	var fld_FPOSTAL = $('#lic_FPOSTAL');
//	if (fld_FPROVINCIA.val() != PROVINCIA_CAPITAL_FEDERAL && fld_FPOSTAL.val() == '') {
//		mensajeAlerta('Debe indicar localidad');
//		return false;
//	}

//	var fld_NPOSTAL = $('#lic_NPOSTAL');
//	if (fld_FPROVINCIA.val() == PROVINCIA_CAPITAL_FEDERAL) {
//		if (fld_NPOSTAL.val() == '') {
//			mensajeAlerta('Debe indicar código postal');
//			return false;
//		}
//		var n = toNumber(fld_NPOSTAL.val());
//		if (n === false || n <= 0) {
//			mensajeAlerta('El código postal debe ser un número mayor que cero');
//			return false;
//		}
//		fld_NPOSTAL.val(n);
//	} else
//		fld_NPOSTAL.val('');

	var fld_CCONTACTO = $('#lic_CCONTACTO');
	if (fld_CCONTACTO.val() == '') {
		mensajeAlerta('Debe indicar al menos un teléfono de contacto');
		return false;
	}

	var fld_NCAPITAS = $('#lic_NCAPITAS');
	if (fld_NCAPITAS.val() == '') {
		mensajeAlerta('Debe indicar cantidad de empleados');
		return false;
	}
	var n = toNumber(fld_NCAPITAS.val());
	if (n === false || n <= 0) {
		mensajeAlerta('Cantidad de empleados debe ser un número mayor que cero');
		return false;
	}
	fld_NCAPITAS.val(n);

	var fld_MNOMINA = $('#lic_MNOMINA');
	if (fld_MNOMINA.val() == '') {
		mensajeAlerta('Debe indicar el total de sueldos en $');
		return false;
	}
	var n = toNumber(fld_MNOMINA.val());
	if (n === false || n <= 0) {
		mensajeAlerta('el total de sueldos en $ debe ser un número mayor que cero');
		return false;
	}
	fld_MNOMINA.val(n);

	var fld_FARTACTUAL = $('#lic_FARTACTUAL');
	if (isNaN(fld_FARTACTUAL.val()))
		fld_FARTACTUAL.val('');
	else
		fld_FARTACTUAL.val(parseInt(fld_FARTACTUAL.val()));

	var fld_NFIJO_ARTACTUAL = $('#lic_NFIJO_ARTACTUAL');
	if (fld_NFIJO_ARTACTUAL.val() != '') {
		var n = toNumber(fld_NFIJO_ARTACTUAL.val());
		if (n === false || n <= 0) {
			mensajeAlerta('El importe fijo pagado actualmente en la ART debe ser un número mayor que cero');
			return false;
		}
		fld_NFIJO_ARTACTUAL.val(n);
	}

	var fld_MALICUOTA_ARTACTUAL = $('#lic_MALICUOTA_ARTACTUAL');
	if (fld_MALICUOTA_ARTACTUAL.val() != '') {
		var n = toNumber(fld_MALICUOTA_ARTACTUAL.val(), 2);
		if (n === false) {
			mensajeAlerta('El % de alicuota actual debe ser numérico');
			return false;
		}
		if (n < 0 || n > 100) {
			mensajeAlerta('El % de alicuota actual debe ser un número entre 0 y 100');
			return false;
		}
		fld_MALICUOTA_ARTACTUAL.val(n);
	}

	var fld_FESTADOWKF = $('#lic_FESTADOWKF');
	{
		var n = toNumber(fld_FESTADOWKF.val());
		if (n === false)
			fld_FESTADOWKF.val(1);
		else
			fld_FESTADOWKF.val(n);
	}

	// Indica que debe enviar el mail de aceoptación
	var fld_BMAIL = $('#lic_BMAIL');
	fld_BMAIL.val('1');

	$.blockUI({
		message : '<h3><img src="img/busy.gif" /> Espere, actualizando ...</h3>'
	});

	$('#licitacionForm').submit();
}
