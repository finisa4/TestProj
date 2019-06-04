<?php
	//INSERT
	include "../includes/db_conf/connection.php";
	if($_POST["operacao"] == "IN"){
		$sql = "SELECT status FROM motorista where cpf = '" . $_POST["cpf"] . "'";

		if ($result = $conn->query($sql)) {

		    /* Determinar número de linhas do set de resultados */
		    $row_cnt = $result->num_rows;

		    if($row_cnt > 0) echo "E1";
		    else {
		    	$sql = "INSERT INTO motorista (nome, data_nasc, cpf, modelo_carro, status, sexo)
				VALUES ('".$_POST["nome"]."', 
						'".$_POST["data"]."', 
						'".$_POST["cpf"]."', 
						'".$_POST["carro"]."', 
						'".$_POST["status"]."',
						'".$_POST["sexo"]."')";

				if ($conn->query($sql) === TRUE) echo "OK";
				else echo "E2".$conn->erro;
		    }

		    /* fechando set de resultados */
		    $result->close();
		}
		else
			echo "E3";
	}
	//UPDATE
	else if($_POST["operacao"] == "UP"){
		if($_POST["tipo"] == "status"){
			$sql = "SELECT status FROM motorista WHERE id_motorista = " . $_POST["id_m"];
			$resultados = mysqli_query($conn, $sql)
				or die (mysqli_error());
			if(mysqli_num_rows($resultados)  < 1) echo "E0";
			else{
				while ($res=mysqli_fetch_array($resultados))
					$status = $res[0];
				if($status == 'A')
					$status = 'I';
				else 
					$status = 'A';

				$sql = "UPDATE motorista SET status = '".$status."' WHERE id_motorista = ".$_POST["id_m"];
				if ($conn->query($sql) === TRUE) echo $status;
				else echo "E1 ".$conn->erro;
			}

		}
		/*$sql = "SELECT status FROM motorista WHERE cpf = '" . $_POST["cpf"] . "' AND id_motorista != " . $_POST["id_moto"];
		if ($result = $conn->query($sql)) {

		    // Determinar número de linhas do set de resultados
		    $row_cnt = $result->num_rows;

		    if($row_cnt > 0) echo "E1";
		    else {
		    	$sql = "UPDATE motorista SET
		    		nome = '".$_POST["nome"]."', 
					data_nasc = '".$_POST["data"]."', 
					cpf = '".$_POST["cpf"]."', 
					modelo_carro = '".$_POST["carro"]."', 
					status = '".$_POST["status"]."',
					sexo = '".$_POST["sexo"]."'
					WHERE id_motorista = ".$_POST["id_moto"];

				if ($conn->query($sql) === TRUE) echo "OK";
				else echo "E2".$conn->erro;
		    }

		    ///fechando set de resultados
		    $result->close();
		}
		else{
			echo "E3";
		}*/
	}

	$conn->close();
?>