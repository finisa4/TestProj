//CONTROLE E VALIDAÇÃO DE TODOS OS FORMULÁRIOS DA APLICAÇÃO
$(document).ready(function(){
	$('#submitMotorista').click(function(){
		var submit = true;

		var nome = $("#nome").val().trim();
		var data = $("#data").val().trim();
		var cpf = $("#cpf").val().trim();
		var carro = $("#carro").val().trim();

		if(nome == ""){
			$("#nomeHelp").html("Favor digitar o nome do motorista!");
			$("#nomeHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else
			$("#nomeHelp").removeClass("text-danger").addClass("text-white");

		if(!(isDate(data))) {
			$("#dataHelp").html("Favor digitar uma data válida!");
			$("#dataHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else{
			var dataIdade = data.split('-');
			if(idade(dataIdade[0],dataIdade[1],dataIdade[2]) < 18){
				$("#dataHelp").html("Motorista menor de idade!");
				$("#dataHelp").removeClass("text-white").addClass("text-danger");
				submit = false;
			}
			else
				$("#dataHelp").removeClass("text-danger").addClass("text-white");
		}

		if(!(validCPF(cpf))) {
			$("#cpfHelp").html("CPF inválido");
			$("#cpfHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else{
			$("#cpfHelp").removeClass("text-danger").addClass("text-white");
		}

		if(carro == ""){
			$("#carroHelp").html("Descreva o modelo do carro!");
			$("#carroHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else
			$("#carroHelp").removeClass("text-danger").addClass("text-white");

		if (!($('#sFem').is(':checked')) && !($('#sMasc').is(':checked'))){
			$("#sexoHelp").html("Selecione o sexo do(a) motorista!");
			$("#sexoHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else
			$("#sexoHelp").removeClass("text-danger").addClass("text-white");

		if (!($('#sAtivo').is(':checked')) && !($('#sInativo').is(':checked'))){
			$("#statusHelp").html("Selecione o status do(a) motorista!");
			$("#statusHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else
			$("#statusHelp").removeClass("text-danger").addClass("text-white");

		if(!submit) return false;
		else {
			var cpfFormatado = cpf.substring(0, 3) + "." + cpf.substring(3, 6) + "." + cpf.substring(6, 9) + "-" + cpf.substring(9, 11);
			var sexo = $('#sFem').is(':checked') ? 'F' : 'M';
			var status = $('#sAtivo').is(':checked') ? 'A' : 'I';

			$.ajax({
			    url: "operations/opr_motorista.php",
			    type: "POST",
			    data: "operacao=IN&nome="+nome+"&data="+data+"&carro="+carro+"&cpf="+cpfFormatado+"&sexo="+sexo+"&status="+status,
			    dataType: "html"

			}).done(function(resposta) {
			    if(resposta == "E1") {
			    	$("#cpfHelp").html("CPF já cadastrado no sistema!");
					$("#cpfHelp").removeClass("text-white").addClass("text-danger");
			    }
			    if(resposta == "OK"){
			    	$("#cpfHelp").removeClass("text-danger").addClass("text-white");
			    	$("#cadOK").html('Novo motorista adicionado!');
			    	$("#cadOK").slideDown();
			    	$('#nome').val('');
			    	$('#carro').val('');
			    	$('#cpf').val('');
			    	$('#data').val('');
			    	$('#sFem').prop('checked' , false);
			    	$('#sMasc').prop('checked' , false);
			    	$('#sAtivo').prop('checked' , false);
			    	$('#sInativo').prop('checked' , false);
			    	$('#nome').focus();
			    	setTimeout(function(){
			    		$("#cadOK").slideUp();
			    	}, 5000);
			    }
			    if(/E2/.test(resposta) || /E3/.test(resposta)) console.log(resposta);

			}).fail(function(jqXHR, textStatus ) {
			    console.log("Request failed: " + textStatus);

			});
		}
	});

	$('#submitPassageiro').click(function(){
		var submit = true;

		var nome = $("#nome").val().trim();
		var data = $("#data").val().trim();
		var cpf = $("#cpf").val().trim();

		if(nome == ""){
			$("#nomeHelp").html("Favor digitar o nome do passageiro!");
			$("#nomeHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else
			$("#nomeHelp").removeClass("text-danger").addClass("text-white");

		if(!(isDate(data))) {
			$("#dataHelp").html("Favor digitar uma data válida!");
			$("#dataHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else{
			/*var dataIdade = data.split('-');
			if(idade(dataIdade[0],dataIdade[1],dataIdade[2]) < 18){
				$("#dataHelp").html("Passageiro menor de idade!");
				$("#dataHelp").removeClass("text-white").addClass("text-danger");
				submit = false;
			}
			else*/
				$("#dataHelp").removeClass("text-danger").addClass("text-white");
		}

		if(!(validCPF(cpf))) {
			$("#cpfHelp").html("CPF inválido");
			$("#cpfHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else{
			$("#cpfHelp").removeClass("text-danger").addClass("text-white");
		}

		if (!($('#sFem').is(':checked')) && !($('#sMasc').is(':checked'))){
			$("#sexoHelp").html("Selecione o sexo do(a) passageiro(a)!");
			$("#sexoHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else
			$("#sexoHelp").removeClass("text-danger").addClass("text-white");

		if(!submit) return false;
		else {
			var cpfFormatado = cpf.substring(0, 3) + "." + cpf.substring(3, 6) + "." + cpf.substring(6, 9) + "-" + cpf.substring(9, 11);
			var sexo = $('#sFem').is(':checked') ? 'F' : 'M';

			$.ajax({
			    url: "operations/opr_passageiro.php",
			    type: "POST",
			    data: "operacao=IN&nome="+nome+"&data="+data+"&cpf="+cpfFormatado+"&sexo="+sexo,
			    dataType: "html"

			}).done(function(resposta) {
			    if(resposta == "E1"){
			    	$("#cpfHelp").html("CPF já cadastrado no sistema!");
					$("#cpfHelp").removeClass("text-white").addClass("text-danger");
			    }
			    if(resposta == "OK"){
			    	$("#cpfHelp").removeClass("text-danger").addClass("text-white");
			    	$("#cadOK").html('Novo passageiro adicionado!');
			    	$("#cadOK").slideDown();
			    	$('#nome').val('');
			    	$('#cpf').val('');
			    	$('#data').val('');
			    	$('#sFem').prop('checked' , false);
			    	$('#sMasc').prop('checked' , false);
			    	$('#nome').focus();
			    	setTimeout(function(){
			    		$("#cadOK").slideUp();
			    	}, 5000);
			    }
			    if(/E2/.test(resposta) || /E3/.test(resposta)) console.log(resposta);

			}).fail(function(jqXHR, textStatus ) {
			    console.log("Request failed: " + textStatus);

			});
		}
	});
	$('#submitCorrida').click(function(){
		var submit = true;
		var m = $("#motorista").children("option:selected").val();
		var p = $("#passageiro").children("option:selected").val();
		var v = $("#valor").val().trim().replace(",",".");
		var d = $("#data").val().trim();

		if(m == 0){
			$("#motoHelp").html("Selecione um motorista!");
			$("#motoHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else
			$("#motoHelp").removeClass("text-danger").addClass("text-white");

		if(p == 0){
			$("#passHelp").html("Selecione um passageiro!");
			$("#passHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else
			$("#passHelp").removeClass("text-danger").addClass("text-white");

		if(v == ""){
			$("#valorHelp").html("Digite um valor!");
			$("#valorHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else{
			if($.isNumeric(v)){
				$("#valorHelp").removeClass("text-danger").addClass("text-white");
				v = parseFloat(v).toFixed(2);
			}
			else{
				$("#valorHelp").html("Digite um valor válido!");
				$("#valorHelp").removeClass("text-white").addClass("text-danger");
				submit = false;
			}
		}

		if(!(isDate(d))) {
			$("#dataHelp").html("Favor digitar uma data válida!");
			$("#dataHelp").removeClass("text-white").addClass("text-danger");
			submit = false;
		}
		else
			$("#dataHelp").removeClass("text-danger").addClass("text-white");

		if(!submit) return false;
		else {
			p /= 27;
			m /= 38;

			$.ajax({
			    url: "operations/opr_corrida.php",
			    type: "POST",
			    data: "operacao=IN&id_p="+p+"&id_m="+m+"&valor="+v+"&data="+d,
			    dataType: "html"

			}).done(function(resposta) {
			    if(resposta == "OK"){
			    	$("#cadOK").html('Nova corrida cadastrada!');
			    	$("#cadOK").slideDown();
			    	$('#motorista option[value="0"]').attr({ selected : "selected" });
			    	$('#passageiro option[value="0"]').attr({ selected : "selected" });
			    	$('#valor').val('');
			    	$('#data').val('');

			    	setTimeout(function(){
			    		$("#cadOK").slideUp();
			    	}, 5000);
			    }
			    if(/E2/.test(resposta) || /E3/.test(resposta)) console.log(resposta);

			}).fail(function(jqXHR, textStatus ) {
			    console.log("Request failed: " + textStatus);
			});
		}
	});
	$(document).on('click', '.edita_status', function(){
		var motorista = $(this).attr('name');
		var here = $(this);
		motorista = motorista.replace('edita_status_','');
		motorista /= 38;

		$.ajax({
			    url: "operations/opr_motorista.php",
			    type: "POST",
			    data: "operacao=UP&tipo=status&id_m="+motorista,
			    dataType: "html"

			}).done(function(resposta) {
				if(/A/.test(resposta) || /I/.test(resposta)){
					if(/A/.test(resposta)){
						here.closest('tr').removeClass("inativo").addClass("ativo");
						here.closest('tr').find('td.alter').html("Ativo");
					}
					else{
						here.closest('tr').removeClass("ativo").addClass("inativo");
						here.closest('tr').find('td.alter').html("Inativo");
					}
				}
			    if(/E1/.test(resposta) || /E2/.test(resposta))
			    	console.log(resposta);

			}).fail(function(jqXHR, textStatus ) {
			    console.log("Request failed: " + textStatus);
		});
	});
});