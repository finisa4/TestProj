function isDate(txtDate) {
	var currVal = txtDate;
	if(currVal == '')
		return false;
	//Declarar Regex 
	var rxDatePattern = /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/;
	var dtArray = currVal.match(rxDatePattern); // formato está OK?
	if (dtArray == null)
		return false;

	dtMonth = dtArray[3];
	dtDay= dtArray[5];
	dtYear = dtArray[1]; 
	if (dtMonth < 1 || dtMonth > 12)
		return false;
	else if (dtDay < 1 || dtDay> 31)
		return false;
	else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
		return false;
	else if (dtMonth == 2) {
		var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
		if (dtDay> 29 || (dtDay ==29 && !isleap))
		    return false;
	}
	return true;
}

function idade(ano_aniversario, mes_aniversario, dia_aniversario) {
    var d = new Date,
       ano_atual = d.getFullYear(),
        mes_atual = d.getMonth() + 1,
        dia_atual = d.getDate(),

        ano_aniversario =+ ano_aniversario,
        mes_aniversario =+ mes_aniversario,
        dia_aniversario =+ dia_aniversario,

        quantos_anos = ano_atual - ano_aniversario;

    if (mes_atual < mes_aniversario || mes_atual == mes_aniversario && dia_atual < dia_aniversario) {
        quantos_anos--;
    }

    return quantos_anos < 0 ? 0 : quantos_anos;
}
function validCPF(strCPF) {
	if(strCPF == "") return false;

    var Soma = 0;
    var Resto;
    var sameNumber = 00000000000;

    while(sameNumber <= 99999999999){
    	if (strCPF == sameNumber) return false;
    	sameNumber += 11111111111;
    }
     
  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
   
  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}