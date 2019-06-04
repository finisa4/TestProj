<?php
	//INSERT
	include "../includes/db_conf/connection.php";
	if($_POST["operacao"] == "IN"){
		$sql = "INSERT INTO corrida (id_passageiro, id_motorista, valor, data)
				VALUES ('".$_POST["id_p"]."', 
						'".$_POST["id_m"]."',
						'".$_POST["valor"]."', 
						'".$_POST["data"]."')";

		if ($conn->query($sql) === TRUE) echo "OK";
		else echo "E2".$conn->erro;
	}
	//UPDATE
	else if($_POST["operacao"] == "UP"){
		$sql = "SELECT data FROM corrida WHERE id_corrida = " . $_POST["id_c"];
		if ($result = $conn->query($sql)) {

		    /* Determinar número de linhas do set de resultados */
		    $row_cnt = $result->num_rows;

		    if($row_cnt > 0) echo "E1";
		    else {
		    	$sql = "UPDATE corrida SET
		    		id_passageiro = '".$_POST["id_p"]."', 
					id_motorista = '".$_POST["id_m"]."', 
					valor = '".$_POST["valor"]."', 
					data = '".$_POST["data"]."'
					WHERE id_corrida = ".$_POST["id_c"];

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