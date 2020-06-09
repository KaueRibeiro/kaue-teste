<?php

$id = $_GET['idEvent'];
$acao = $_GET['acao'];
		if($acao == 'alt'){
				include '../Controls/conexao.php';

				$nome = $_POST ["txt_nome"];
				$end = $_POST ["txt_endereco"];
				$local = $_POST ["txt_local"];
				$data = $_POST ["txt_data"];
				$horario = $_POST ["txt_horario"];
				$infos = $_POST ["txt_infos"];
				$sql = mysql_query ("update evento set nome='$nome', local='$local', data='$data', endereco='$end', informacoes='$infos', horario='$horario' WHERE idEvento = $id");
				header("location: http://localhost:8080/tcc/NeoTicketWeb/Cliente/EventoCliente.php");

				}
				if($acao == 'add'){
				include 'conexao.php';
				$nome = $_POST ["txt_nome"];
				$end = $_POST ["txt_endereco"];
				$local = $_POST ["txt_local"];
				$data = $_POST ["txt_data"];
				$horario = $_POST ["txt_horario"];
				$infos = $_POST ["txt_infos"];		
					$sql = mysql_query ("SELECT * FROM evento WHERE nome = 'txt_nome'");
						if(mysql_num_rows($sql) > 0){
							echo "<center>";
							echo "<hr>";
							echo "Evento  Existente";
							echo "<hr>";
							echo "<br>";
							echo "<a href=\"login.html\"> RETORNAR AO LOGIN </a>";
							} else {
								$sql = mysql_query ("INSERT INTO evento(nome,local,data,imagem,empresa,endereco,logoEmpresa,informacoes,horario) VALUES ('$nome', '$descri','$end','$data' , '$imagem', '$empresa')");
								echo "<center>";
								echo "<hr>";
								echo "Evento criado COM SUCESSO";
								echo "<hr>";
								echo "<br>";
								echo "<a href = \"login.html\">RETORNAR AO LOGIN </a>";
							}
							}
?>