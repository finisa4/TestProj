<?php
	include "../includes/db_conf/connection.php";
	//pegando tipo de consulta: listagem ou contador
   	$tipo=$_POST['tipo'];
	//se o tipo for listagem
   	if($tipo=='listagem'){ 
   		$pag=$_POST['pag']; 
   		$maximo=$_POST['maximo'];
		$inicio = ($pag * $maximo) - $maximo; //Variável para LIMIT da sql
		?>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Data de Nascimento</th>
				<th>CPF</th>
				<th>Sexo</th>
				<th>Modelo do carro</th>
				<th>Status</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
		<?php
   		$sql="SELECT * FROM motorista ORDER BY nome LIMIT $inicio, $maximo"; //consulta no BD
				$resultados = mysqli_query($conn, $sql) //Executando consulta
				or die (mysqli_error()); //Se ocorrer erro mostre-o
				if (mysqli_num_rows($resultados)  < 1) echo("<tr><td>Nenhum registro encontrado</td><td></td><td></td><td></td><td></td><td></td></tr>");
				while ($res=mysqli_fetch_array($resultados)) { //laço para listagem de itens
				$id = $res[0] * 38;
				$nome = $res[1];
				$dt = $res[2];
				$dt_split = preg_split('/-/', $dt);
				$cpf = $res[3];
				$sex = $res[6] == "F" ? "Feminino" : "Masculino";	
				$carro = $res[4];
				$status = $res[5] == "A" ? "Ativo" : "Inativo";	
				$class = $res[5] == "A" ? "ativo" : "inativo"; //DEFINIÇÃO DE BACKGROUND DAS LINHAS DA TABELA CONFORME STATUS DO MOTORISTA
			?>
			<tr class="<?php echo $class; ?>">
				<td><?php echo $nome; ?></td>
				<td><?php echo $dt_split[2].'/'.$dt_split[1].'/'.$dt_split[0]; ?></td>
				<td><?php echo $cpf; ?></td>
				<td><?php echo $sex; ?></td>
				<td><?php echo $carro; ?></td>
				<td class="alter"><?php echo $status; ?></td>
				<td><input type="button" name="edita_status_<?php echo $id;?>" class="edita_status btn btn-info btn-sm" value="Alterar status"/>
			</tr>
			<?php } ?>
		</tbody>
	<?php }
   	else if($tipo=='contador'){
   		if($sql_res=mysqli_query($conn, "SELECT * FROM motorista"))
   			$contador = $sql_res->num_rows;
   		else
   			$contador = 0;
		echo $contador;
   	}
   	else if($tipo=='corrida'){
   		$sql = "SELECT id_motorista, nome, cpf FROM motorista WHERE status = 'A' ORDER BY nome"; //MOTORISTAS INATIVOS NÃO PODEM SER SELECIONADOS
   		$opcoes = mysqli_query($conn, $sql) or die (mysqli_error());
		if (mysqli_num_rows($opcoes) == 0) echo('<option value="0">Nenhum registro encontrado</option>');
		else echo('<option value="0">Selecione</option>');
		while ($op=mysqli_fetch_array($opcoes)) {
			$id = $op[0] * 38;
			$nome = $op[1];
			$cpf = $op[2];
			echo('<option value="'.$id.'">'.$nome.' - '.$cpf.'</option>');
		}
   	}
   	else
   		echo "Solicitação inválida";
   	$conn->close();
?>