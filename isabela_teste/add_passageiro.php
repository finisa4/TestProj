<!DOCTYPE html>
<html>
<head>
	<?php include "includes/mss.php"; ?>
	<title>Shared Runs - Adicionar novo motorista</title>
	<style type="text/css">
		.help{ transition: color 0.3s ease-in-out; }
		.help.text-white{ color: transparent; }
	</style>
</head>
<body>
	<?php include "includes/nav.php"; ?>
	<main class="bd-masthead" role="main">
		<div class="container">
			<form id="add_passageiro">
				<div class="card mt-5 shadow-sm">
					<div class="card-header">
						<h5 class="card-title text-center">Cadastrar um novo passageiro</h5>
					</div>
					<div class="col-sm-12 p-4">
						<div class="row">
							<div class="col-sm-6" style="display: inline-block;">
								<div class="form-group">
									<label for="nome">Nome</label>
									<input type="text" maxlength="255" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" placeholder="Digite o nome completo">
									<small id="nomeHelp" class="form-text text-white help">&nbsp;</small>
								</div>
								<div class="form-group">
									<label for="data">Data de Nascimento</label>
									<input type="date" class="form-control" id="data" name="data" placeholder="Escolha aqui a data de nascimento">
									<small id="dataHelp" class="form-text text-white help">&nbsp;</small>
								</div>
							</div>
							<div class="col-sm-6" style="display: inline-block;">
								<div class="form-group">
									<label for="motoCpf">CPF</label>
									<input type="text" maxlength="11" name="cpf" class="form-control" id="cpf" placeholder="Digite um CPF válido">
									<small id="cpfHelp" class="form-text text-white help">&nbsp;</small>
								</div>
								<div class="form-group">
									<label>Sexo</label>
									<div class="custom-control custom-radio">
										<input type="radio" id="sFem" name="sexo" class="custom-control-input" value="F">
										<label class="custom-control-label" for="sFem">Feminino</label>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" id="sMasc" name="sexo" class="custom-control-input" value="M">
										<label class="custom-control-label" for="sMasc">Masculino</label>
									</div>
									<small id="sexoHelp" class="form-text text-white help">&nbsp;</small>
								</div>
							</div>
						</div>
						<div class="row justify-content-md-center">
							<div class="col col-lg-4 pl-5 pr-5">
      							<input type="button" class="btn btn-primary btn-block" id="submitPassageiro" value="Enviar">
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