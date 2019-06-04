<?php
	//INSERT
	include "../includes/db_conf/connection.php";
	if($_POST["operacao"] == "IN"){
		$sql = "SELECT sexo FROM passageiro where cpf = '" . $_POST["cpf"] . "'";

		if ($result = $conn->query($sql)) {

		    /* Determinar número de linhas do set de resultados */
		    $row_cnt = $result->num_rows;

		    if($row_cnt > 0) echo "E1";
		    else {
		    	$sql = "INSERT INTO passageiro (nome, data_nasc, cpf, sexo)
				VALUES ('".$_POST["nome"]."', 
						'".$_POST["data"]."', 
						'".$_POST["cpf"]."', 
						'".$_POST["sexo"]."')";

				if ($conn->query($sql) === TRUE) echo "OK";
				else echo "E2".$conn->erro;
		    }

		    /* fechando set de resultados */
		    $result->close();
		}
		else{
			echo "E3";
		}
	}
	//UPDATE
	else if($_POST["operacao"] == "UP"){
		$sql = "SELECT sexo FROM passageiro WHERE cpf = '" . $_POST["cpf"] . "' AND id_passageiro != " . $_POST["id_pass"];
		if ($result = $conn->query($sql)) {

		    /* Determinar número de linhas do set de resultados */
		    $row_cnt = $result->num_rows;

		    if($row_cnt > 0) echo "E1";
		    else {
		    	$sql = "UPDATE motorista SET
		    		nome = '".$_POST["nome"]."', 
					data_nasc = '".$_POST["data"]."', 
					cpf = '".$_POST["cpf"]."', 
					sexo = '".$_POST["sexo"]."'
					WHERE id_passageiro = ".$_POST["id_pass"];

				if ($conn->query($sql) === TRUE) echo "OK";
				else echo "E2".$conn->erro;
		    }

		    /* fechando set de resultados */
		    $result->close();
		}
		else{
			echo "E3";
		}
	}
	//DELETE - FALTA CRIAR O DELETE PARA A TABELA CORRIDA, POIS O BANCO É RELACIONAL
	/*else if($_POST["operacao"] == "DEL"){
		$sql = "DELETE FROM motorista WHERE id_motorista = ".$_POST["id_moto"];

		if ($conn->query($sql) === TRUE) echo "OK";
		else echo "E2".$conn->erro;
	}*/

	$conn->close();
?>