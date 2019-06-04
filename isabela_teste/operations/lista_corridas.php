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
				<th>Nome do motorista</th>
				<th>Nome do passageiro</th>
				<th>Valor da corrida</th>
				<th>Data da corrida</th>
			</tr>
		</thead>
		<tbody>
		<?php
   			$sql="SELECT id_corrida, motorista.nome, passageiro.nome, valor, data FROM corrida INNER JOIN motorista ON motorista.id_motorista = corrida.id_motorista INNER JOIN passageiro ON passageiro.id_passageiro = corrida.id_passageiro LIMIT $inicio, $maximo";
				$resultados = mysqli_query($conn, $sql)
				or die (mysqli_error());
				if (mysqli_num_rows($resultados)  < 1) echo("<tr><td>Nenhum registro encontrado</td><td></td><td></td><td></td></tr>");
				while ($res=mysqli_fetch_array($resultados)) {
				$id = $res[0];
				$nome_m = $res[1];
				$nome_p = $res[2];
				$valor = "R$" . number_format($res[3], 2, ',', '.'); //FORMATAÇÃO DE MOÉDA NO FORMATO BRASILEIRO
				$dt = $res[4];
				$dt_split = preg_split('/-/', $dt);
			?>
			<tr>
				<td>
					<?php echo $nome_m; ?>
					<input class="id_race" type="hidden" value="<?php echo $id; ?>">
				</td>
				<td><?php echo $nome_p; ?></td>
				<td><?php echo $valor; ?></td>
				<td><?php echo $dt_split[2].'/'.$dt_split[1].'/'.$dt_split[0]; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	<?php }
   	else if($tipo=='contador'){
   		if($sql_res=mysqli_query($conn, "SELECT * FROM corrida"))
   			$contador = $sql_res->num_rows;
   		else
   			$contador = 0;
		echo $contador;
   	}
   	else
   		echo "Solicitação inválida";
   	$conn->close();
?>