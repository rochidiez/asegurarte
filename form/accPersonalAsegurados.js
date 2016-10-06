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

	$("#dialogoAsegurado").dialog({
		autoOpen : false,
		modal : true,
		width : 'auto',
		resizable : false,
		dialogClass : "dlg-no-close"
	});

	$("#ase_CNACIMIENTO").datepicker({
		format : 'dd/mm/yyyy',
		language : 'es-ES',
		startView : '1'
	});

	
	$('#acc_ASEGURADOS').bootstrapTable().on('load-success.bs.table', function (e, data) {
    	if( data.length == 0 ){
    		// Si no hay datos abre el formulario de ingreso de Asegurados
    		$('#dialogoAsegurado').dialog('open');
    	}
    }); 
	
	/*
	 * Maneja los eventos de la columna 'Acción' de la grilla
	 */
	window.eventosAccion = {
		'click .edit' : function(e, value, row, index) {
			// Pasa los datos desde la grilla al formulario
			$('#ase_PASEGURADO').val(row['PASEGURADO']);
			$('#ase_CNOMBRE').val(row['CNOMBRE']);
			$('#ase_NDNI').val(row['NDNI']);
			$('#ase_CNACIMIENTO').val(row['CNACIMIENTO']);
			$('#ase_CACTIVIDAD').val(row['CACTIVIDAD']);
			
			$('#dialogoAsegurado').dialog('open');
		},
		'click .remove' : function(e, value, row, index) {
			$('#ase_PASEGURADO').val(row['PASEGURADO']);
			$('#accPersonalAseguradoForm').submit();
		}
	};

	inicializaVariables();
});

/**
 * <p>
 * Da el formato de la columna 'Acción' de la grilla
 * </p>
 * 
 * @param value
 * @param row
 * @param index
 * @returns
 */
function formatoAccion(value, row, index) {
	return [ '<a class="edit ml10" href="javascript:void(0)" title="Editar">', //
	'<i class="glyphicon glyphicon-edit"></i>', //
	'</a>', //
	'&nbsp;', //
	'&nbsp;', //
	'&nbsp;', //
	'&nbsp;', //
	'&nbsp;', //
	'<a class="remove ml10" href="javascript:void(0)" title="Eliminar">', //
	'<i class="glyphicon glyphicon-remove"></i>', //
	'</a>' //
	].join('');
}

/**
 * <p>
 * Prepara el dialogo de mensajes
 * </p>
 * 
 * @param cMensaje
 * @param fnCallback
 */
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

function validaDniMsg(nCuit) {
	if (nCuit == '')
		return;
	if (!validaCuit(nCuit) && !validaDni(nCuit))
		mensajeAlerta('CUIT/DNI no es válido');
}

function fnEditAsegurado(){
	// Limpia el formulario
	$('#ase_CNOMBRE').val('');
	$('#ase_NDNI').val('');
	$('#ase_CNACIMIENTO').val('');
	$('#ase_CACTIVIDAD').val('');
	
	$('#dialogoAsegurado').dialog('open');
}
