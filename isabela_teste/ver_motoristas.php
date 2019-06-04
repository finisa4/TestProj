<!DOCTYPE html>
<html>
<head>
	<?php include "includes/mss.php"; ?>
	<title>Shared Runs - Visualizar motoristas</title>
	<link rel="stylesheet" href="css/paginator.css" />
	<script type="text/javascript" src="js/paginator.js"></script>
	
	<style type="text/css">
		.ativo{ background-color: #F1FDFA; color: #005335; }
		.inativo{ background-color: #F8F8F8; color: #A0A0A0; }
	</style>
</head>
<body>
	<?php include "includes/nav.php"; ?>
	<main class="bd-masthead" role="main">
		<div class="container">
			<input type="hidden" id="entity" value="motoristas"/>
			<table class="table text-center mt-5" id="conteudo" width="300">
			
			</table>
			<table id="paginador" class="mx-auto mb-5 mt-5">
				
			</table>
		</div>
	</main>
</body>
</html>