<?php
	include "../includes/db_conf/connection.php";
   	$tipo=$_POST['tipo'];

   	if($tipo=='listagem'){ 
   		$pag=$_POST['pag']; 
   		$maximo=$_POST['maximo'];
		$inicio = ($pag * $maximo) - $maximo;
		?>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Data de Nascimento</th>
				<th>CPF</th>
				<th>Sexo</th>
			</tr>
		</thead>
		<tbody>
		<?php
   			$sql="SELECT * FROM passageiro ORDER BY nome LIMIT $inicio, $maximo";
				$resultados = mysqli_query($conn, $sql)
				or die (mysqli_error());
				if (mysqli_num_rows($resultados)  < 1) echo("<tr><td>Nenhum registro encontrado</td><td></td><td></td><td></td></tr>");
				while ($res=mysqli_fetch_array($resultados)) {
				$id = $res[0] * 27;
				$nome = $res[1];
				$dt = $res[2];
				$dt_split = preg_split('/-/', $dt);
				$cpf = $res[3];
				$sex = $res[4] == F ? "Feminino" : "Masculino";	
			?>
			<tr>
				<td>
					<?php echo $nome; ?>
					<input class="id_pass" type="hidden" value="<?php echo $id; ?>" readonly>
				</td>
				<td><?php echo $dt_split[2].'/'.$dt_split[1].'/'.$dt_split[0]; ?></td>
				<td><?php echo $cpf; ?></td>
				<td><?php echo $sex; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	<?php }
   	else if($tipo=='contador'){
   		if($sql_res=mysqli_query($conn, "SELECT * FROM passageiro"))
   			$contador = $sql_res->num_rows;
   		else
   			$contador = 0;
		echo $contador;
   	}
   	else if($tipo=='corrida'){
   		$sql = "SELECT id_passageiro, nome, cpf FROM passageiro ORDER BY nome";
   		$opcoes = mysqli_query($conn, $sql) or die (mysqli_error());
		if (mysqli_num_rows($opcoes) == 0) echo('<option value="0">Nenhum registro encontrado</option>');
		else echo('<option value="0">Selecione</option>');
		while ($op=mysqli_fetch_array($opcoes)) {
			$id = $op[0] * 27;
			$nome = $op[1];
			$cpf = $op[2];
			echo('<option value="'.$id.'">'.$nome.' - '.$cpf.'</option>');
		}
   	}
   	else
   		echo "Solicitação inválida";
   	$conn->close();
?>