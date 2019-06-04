<!DOCTYPE html>
<html>
<head>
	<?php include "includes/mss.php"; ?>
	<title>Shared Runs - Cadastrar nova corrida</title>
	<style type="text/css">
		.help{ transition: color 0.3s ease-in-out; }
		.help.text-white{ color: transparent; }
		.span_moeda{ position: absolute; top :40px; left: 30px; }
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			//LISTA PASSAGEIROS NO SELECT
			$.ajax({
				type: 'POST',
				data: 'tipo=corrida',
				url:'operations/lista_passageiros.php',
			   	success: function(retorno){
			    	$('#passageiro').html(retorno);
			    }
		    });

		    //LISTA MOTORISTAS NO SELECT
			$.ajax({
				type: 'POST',
				data: 'tipo=corrida',
				url:'operations/lista_motoristas.php',
			   	success: function(retorno){
			    	$('#motorista').html(retorno);
			    }
		    });
		});
	</script>
</head>
<body>
	<?php include "includes/nav.php"; ?>
	<main class="bd-masthead" role="main">
		<div class="container">
			<form id="add_motorista">
				<div class="card mt-5 shadow-sm">
					<div class="card-header">
						<h5 class="card-title text-center">Cadastrar uma nova corrida</h5>
					</div>
					<div class="col-sm-12 p-4">
						<div class="row">
							<div class="col-sm-6 d-inline-block">
								<div class="form-group">
									<label for="motorista">Motorista</label>
									<select id="motorista" name="motorista" class="custom-select"></select>
									<small id="motoHelp" class="form-text text-white help">&nbsp;</small>
								</div>
								<div class="form-group">
									<label for="passageiro">Passageiro</label>
									<select id="passageiro" name="passageiro" class="custom-select"></select>
									<small id="passHelp" class="form-text text-white help">&nbsp;</small>
								</div>
							</div>
							<div class="col-sm-6 d-inline-block">
								<div class="form-group">
									<label for="valor">Valor da Corrida</label>
  									<div>
										<input type="text" maxlength="9" id="valor" name="valor" class="form-control d-inline-block pl-5"/>
  										<span class="span_moeda d-inline-block">R$</span>
									</div>
									<small id="valorHelp" class="form-text text-white help">&nbsp;</small>
								</div>
		    					<div class="form-group">
									<label for="data">Data da Corrida</label>
									<input type="date" id="data" name="data" class="form-control">
									<small id="dataHelp" class="form-text text-white help">&nbsp;</small>
								</div>
							</div>
						</div>
						<div class="row justify-content-md-center mb-4 mt-3">
							<div class="col col-lg-4 pl-5 pr-5">
	      						<input type="button" class="btn btn-primary btn-block" id="submitCorrida" value="Enviar">
								<div class="alert alert-success mt-3" id="cadOK" style="display: none;" role="alert"></div>
	    					</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</main>
</body>
</html>