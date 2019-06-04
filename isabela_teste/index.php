<!DOCTYPE html>
<html>
<head>
	<?php include "includes/mss.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/img_buttons.css"/>
	<title>Shared Runs</title>
	<style>
		.reference_icon{
			position: absolute;
			right: 1%;
			bottom: 1%;
			text-align: right;
		}
	</style>
</head>
<body>
	<?php include "includes/nav.php"; ?>
	<div class="quadrado mt-5 mr-5">
		<div class="icon_menu" id="im1">
			<div class="outer_img">
				<img class="img_theme" id="driver" src="img/driver.png" title="Motorista">
			</div>
			<div class="actions mt-3">
				<div class="outer_lookup">
					<div class="lookup">
						<a href="ver_motoristas.php" title="Visualizar motoristas"><img class="img_lookup" src="img/lupa.png"></a>
					</div>
				</div>
				<div class="outer_add">
					<div class="add">
						<a href="add_motorista.php" title="Adicionar motorista"><img class="img_add" src="img/plus.png"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="quadrado mt-5 ml-5 mr-5">
		<div class="icon_menu" id="im1">
			<div class="outer_img">
				<img class="img_theme" id="run" src="img/run.png" title="Corrida compartilhada">
			</div>
			<div class="actions mt-3">
				<div class="outer_lookup">
					<div class="lookup">
						<a href="ver_corridas.php" title="Visualizar corridas"><img class="img_lookup" src="img/lupa.png"></a>
					</div>
				</div>
				<div class="outer_add">
					<div class="add">
						<a href="add_corrida.php" title="Adicionar corrida"><img class="img_add" src="img/plus.png"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="quadrado mt-5 ml-5 mr-5s">
		<div class="icon_menu" id="im1">
			<div class="outer_img">
				<img class="img_theme" id="passenger" src="img/passenger.png" title="Passageiro">
			</div>
			<div class="actions mt-3">
				<div class="outer_lookup">
					<div class="lookup">
						<a href="ver_passageiros.php" title="Visualizar passageiros"><img class="img_lookup" src="img/lupa.png"></a>
					</div>
				</div>
				<div class="outer_add">
					<div class="add">
						<a href="add_passageiro.php" title="Adicionar passageiro"><img class="img_add" src="img/plus.png"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="reference_icon">
		<small>Icons made from <a href="http://www.onlinewebfonts.com/icon">Icon Fonts</a> is licensed by CC BY 3</small><br>
		<small>Images edited with <a href="http://www.photoshoponline.net.br/">Photoshop Online</a></small>
	</div>
</body>
</html>