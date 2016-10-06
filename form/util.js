function encode2(cUnencoded) {
	return encodeURIComponent(cUnencoded).replace(/'/g, "%27").replace(/"/g, "%22");
}

function decode2(cEncoded) {
	return decodeURIComponent(cEncoded.replace(/\+/g, " "));
}

/**
 * <p>
 * Valida que el EMAIL este bien armado
 * </p>
 * 
 * @param sEmail
 * @returns {Boolean}
 */
function validaEmail(sEmail) {
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (filter.test(sEmail)) {
		return true;
	} else {
		return false;
	}
}

/**
 * <p>
 * Si cVal es numérico se devuelve el número, sino vacío
 * <p>
 * 
 * @param cVal
 * @param nDec
 * @returns
 */
function toNumberEmpty(cVal, nDec) {
	var n = toNumber(cVal, nDec);
	if (n === false)
		return '';
	return n;
}

/**
 * <p>
 * Si cVal es numérico se devuelve el número, sino FALSE
 * <p>
 * 
 * @param cVal
 * @param nDec
 * @returns
 */
function toNumber(cVal, nDec) {
	if (cVal == '')
		return false;

	numRes = NaN;
	if (nDec == undefined || nDec <= 0) {
		// Entero
		numRes = parseInt(cVal);
	} else {
		// Decimal reemplaza comas por puntos
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
 * <p>
 * Valida digito verificados de la CUIT
 * </p>
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

/**
 * Valida digito verificados de la CUIT
 * 
 * @param {int}
 *            numCuit
 * @return {Boolean}
 */
function validaDni(numCuit) {
	if (numCuit.length < 7 || numCuit.length > 10)
		return false;
	var n = toNumber(numCuit, 0);
	if (n === false)
		return false;
	return true;
}
